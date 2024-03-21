FROM php:8.3-fpm

# Установка расширений pdo_pgsql и pgsql
RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install pdo_pgsql pgsql
