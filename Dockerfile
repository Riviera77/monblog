# --- 1) Composer: vendors sans dépendances dev ---
FROM composer:2 AS composer_build
WORKDIR /app
COPY composer.json composer.lock ./
RUN composer install --no-dev --prefer-dist --no-scripts --no-progress

# --- 2) Node: build des assets Vite ---
FROM node:20 AS node_build
WORKDIR /app
COPY package*.json ./
RUN npm ci
COPY resources/ resources/
COPY vite.config.* ./
RUN npm run build

# --- 3) Runtime: PHP-FPM + Nginx + Supervisord ---
FROM php:8.2-fpm-alpine AS runtime
WORKDIR /var/www/html

# OS deps + extensions PHP (Laravel + Postgres)
RUN apk add --no-cache nginx supervisor bash icu-dev libpq-dev \
    && docker-php-ext-install intl pdo pdo_pgsql opcache bcmath

# Copier le code
COPY . .

# Vendors & assets compilés
COPY --from=composer_build /app/vendor ./vendor
COPY --from=node_build /app/public/build ./public/build

# Config Nginx (port dynamique $PORT injecté par Heroku)
COPY nginx/nginx.conf.template /etc/nginx/conf.d/default.conf.template

# Supervisord
COPY deploy/supervisord.conf /etc/supervisord.conf

# Permissions Laravel
RUN chown -R www-data:www-data storage bootstrap/cache

# Variables de base
ENV APP_ENV=production
ENV LOG_CHANNEL=stderr
ENV PORT=8080

# Entrée: activer la conf Nginx (avec $PORT) + démarrer supervisord
CMD ["/bin/sh","-c","envsubst < /etc/nginx/conf.d/default.conf.template > /etc/nginx/conf.d/default.conf && /usr/bin/supervisord -c /etc/supervisord.conf"]