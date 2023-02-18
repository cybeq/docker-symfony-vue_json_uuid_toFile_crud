FROM php:8.1-fpm

RUN apt-get update && apt-get install -y git unzip libzip-dev libxml2-dev libpq-dev libicu-dev

RUN docker-php-ext-install zip pdo_pgsql intl

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN mkdir /app
WORKDIR /app

COPY . .

RUN composer install --optimize-autoloader --no-dev

CMD ["php-fpm"]

EXPOSE 8000

CMD ["php", "-S", "127.0.0.1:8000", "-t", "public"]