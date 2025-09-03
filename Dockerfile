# syntax=docker/dockerfile:1
FROM php:8.2-fpm-alpine

# System deps (add build tools + headers for zip/gd) and nginx+supervisor
RUN apk add --no-cache bash git curl \
    libpng libjpeg-turbo libzip icu-dev oniguruma-dev libxml2-dev \
    libpng-dev jpeg-dev freetype-dev libzip-dev zlib-dev \
    pkgconfig build-base zip unzip nodejs npm \
    nginx supervisor gettext

# PHP extensions
RUN docker-php-ext-configure gd --with-jpeg --with-freetype \
 && docker-php-ext-install -j$(nproc) pdo pdo_mysql gd intl mbstring xml zip opcache

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set workdir
WORKDIR /var/www/html

# Copy code
COPY . /var/www/html

# Create required dirs for nginx/supervisor
RUN mkdir -p /run/nginx /var/log/supervisor

# Nginx vhost template using $PORT
RUN printf "server {\n\
    listen ${PORT};\n\
    server_name _;\n\
    root /var/www/html/public;\n\
    index index.php index.html;\n\
    location / {\n\
        try_files $uri $uri/ /index.php?$query_string;\n\
    }\n\
    location ~ \\.php$ {\n\
        include fastcgi_params;\n\
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;\n\
        fastcgi_pass 127.0.0.1:9000;\n\
        fastcgi_read_timeout 300;\n\
    }\n\
    location ~* \\.(jpg|jpeg|png|gif|svg|css|js|ico|webp)$ {\n\
        expires 7d;\n\
        access_log off;\n\
    }\n\
    location ~ /\\. { deny all; }\n\
}\n" > /etc/nginx/conf.d/default.conf.template

# Supervisor config to run php-fpm and nginx together
RUN printf "[supervisord]\n\
nodaemon=true\n\
logfile=/var/log/supervisor/supervisord.log\n\
[program:php-fpm]\n\
command=/usr/local/sbin/php-fpm -F\n\
autostart=true\n\
autorestart=true\n\
[program:nginx]\n\
command=/bin/sh -c 'envsubst \"$PORT\" < /etc/nginx/conf.d/default.conf.template > /etc/nginx/conf.d/default.conf && nginx -g \"daemon off;\"'\n\
autostart=true\n\
autorestart=true\n" > /etc/supervisord.conf

# Permissions
RUN chown -R www-data:www-data storage bootstrap/cache \
 && chmod -R 775 storage bootstrap/cache || true

# PHP deps
RUN composer install --no-dev --prefer-dist --optimize-autoloader --no-interaction || true

# Assets build only if package.json exists AND has a build script
RUN if [ -f package.json ] && npm run | grep -q " build"; then npm ci && npm run build; else echo "Skipping npm build (no build script)"; fi

# Laravel optimize (best-effort for first build; key may be set at runtime)
RUN php -r "file_exists('.env') || copy('.env.example', '.env');" || true \
 && php artisan key:generate --force || true \
 && php artisan storage:link || true \
 && php artisan config:cache || true \
 && php artisan route:cache || true \
 && php artisan view:cache || true

# Default PORT fallback for local
ENV PORT=8080
EXPOSE 8080
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisord.conf"]