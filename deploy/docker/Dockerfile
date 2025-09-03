# syntax=docker/dockerfile:1
FROM php:8.2-fpm-alpine

# System deps
RUN apk add --no-cache bash git curl libpng libjpeg-turbo libzip icu-dev oniguruma-dev libxml2-dev \
    libpng-dev jpeg-dev zip unzip nodejs npm

# PHP extensions
RUN docker-php-ext-configure gd --with-jpeg
RUN docker-php-ext-install -j$(nproc) pdo pdo_mysql gd intl mbstring xml zip opcache

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Workdir
WORKDIR /var/www/html

# Copy app
COPY . /var/www/html

# Permissions (storage, bootstrap cache)
RUN chown -R www-data:www-data storage bootstrap/cache \
 && chmod -R 775 storage bootstrap/cache

# Install PHP deps
RUN composer install --no-dev --prefer-dist --optimize-autoloader --no-interaction

# Build assets (if vite/mix present)
RUN if [ -f package.json ]; then npm ci && npm run build || true; fi

# Laravel optimize
RUN php artisan storage:link || true \
 && php artisan config:cache || true \
 && php artisan route:cache || true \
 && php artisan view:cache || true

USER www-data

EXPOSE 9000
CMD ["php-fpm"]