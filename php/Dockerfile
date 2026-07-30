FROM php:8.1-fpm

WORKDIR /var/www

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    libzip-dev \
    libonig-dev \
    && docker-php-ext-install pdo_mysql mbstring zip

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer