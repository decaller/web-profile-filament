# 1. Use Composer 2 (rolling tag for the latest 2.x version)
FROM composer:2 AS composer_bin

# 2. Vendor Stage (PHP 8.4)
FROM php:8.4-cli-bookworm AS vendor
WORKDIR /app
# Added libzip-dev and zip extension here so Composer can extract packages efficiently
RUN apt-get update \
    && apt-get install -y --no-install-recommends \
    git \
    libicu-dev \
    libzip-dev \
    unzip \
    && docker-php-ext-install -j"$(nproc)" intl zip \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer_bin /usr/bin/composer /usr/bin/composer
COPY composer.json composer.lock ./
RUN composer install --no-dev --prefer-dist --no-interaction --no-scripts --no-progress

# 3. Assets Stage (Upgraded to Node 22 LTS for Tailwind CSS v4.1+)
FROM node:22-bookworm-slim AS assets
WORKDIR /app
COPY package.json package-lock.json ./
RUN npm ci

# Tailwind v4 requires scanning PHP files (app/, resources/) to generate utility classes for Filament v5
COPY . .
COPY --from=vendor /app/vendor ./vendor

RUN npm run build

# 4. Final FPM Stage (PHP 8.4 for Laravel 11.28+ and Filament v5)
FROM php:8.4-fpm-bookworm
WORKDIR /app

# Added SQLite dependencies (libsqlite3-dev, sqlite3) and libonig-dev for mbstring
RUN apt-get update \
    && apt-get install -y --no-install-recommends \
    git \
    libicu-dev \
    libzip-dev \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    unzip \
    libsqlite3-dev \
    sqlite3 \
    libonig-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j"$(nproc)" bcmath exif gd intl mbstring opcache pdo_mysql pdo_sqlite zip \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

COPY --from=vendor /app/vendor ./vendor
COPY --from=assets /app/public/build ./public/build

COPY . .

# Ensure necessary directories exist and set correct permissions
# (SQLite requires the parent directory to be writable by www-data to create journal files)
RUN mkdir -p /app/storage /app/bootstrap/cache /app/database \
    && touch /app/database/database.sqlite \
    && chown -R www-data:www-data /app/storage /app/bootstrap/cache /app/database

EXPOSE 9000
CMD ["php-fpm"]