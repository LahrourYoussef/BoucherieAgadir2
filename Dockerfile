FROM php:8.0-apache

# Installer les dépendances et l'extension pdo_mysql
RUN apt-get update \
    && apt-get install -y --no-install-recommends libzip-dev unzip libpng-dev libjpeg-dev libfreetype6-dev \
    && docker-php-ext-install pdo_mysql \
    && a2enmod rewrite \
    && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/html

EXPOSE 80