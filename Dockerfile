FROM php:8.1-fpm

WORKDIR /var/www/html

ENV COMPOSER_ALLOW_SUPERUSER=1

RUN docker-php-ext-install pdo pdo_mysql

RUN apt-get update && apt-get install -y git \
    unzip \
    nano \
    net-tools

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY ./ /var/www/html

RUN composer install
RUN cat .env.example > .env
RUN php artisan key:generate

EXPOSE 9000

CMD ["php-fpm"]
