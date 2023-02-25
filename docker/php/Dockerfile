FROM php:8.1-fpm-alpine

RUN apk add $PHPIZE_DEPS

RUN docker-php-ext-install mysqli pdo pdo_mysql

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer