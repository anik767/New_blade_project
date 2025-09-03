# Docker deploy for this Laravel project

## Files
- `Dockerfile` – PHP 8.2 FPM image with composer, npm and PHP extensions
- `nginx.conf` – Nginx vhost serving public/
- `docker-compose.yml` – app (php-fpm), web (nginx), db (mysql)

## Prerequisites
- Docker Engine + Docker Compose
- A configured `.env` in the project root

Minimal .env diffs:
```
APP_ENV=production
APP_DEBUG=false
APP_URL=http://localhost:8080
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=laravel
DB_PASSWORD=secret
```

## Start
```
cd deploy/docker
docker compose up -d
```

## First-run setup
```
docker compose exec app php artisan key:generate
docker compose exec app php artisan migrate --force
# optional seed
docker compose exec app php artisan db:seed --class=AboutSeeder
```

Open: http://localhost:8080

## Useful
```
# logs
docker compose logs -f web

# rebuild after changes
docker compose build --no-cache && docker compose up -d

# optimize caches
docker compose exec app php artisan config:cache route:cache view:cache
```

## Production tips
- Map `web` port to 80: change `"8080:80"` → `"80:80"`
- Set real secrets in `.env` (APP_KEY, DB_*, MAIL_*)
- Backups: volume `db_data` contains MySQL data
- SSL: terminate TLS at reverse proxy (Caddy/Traefik/Nginx) or extend nginx image