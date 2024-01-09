FROM php:7.4-fpm

RUN mkdir -p /var/www/html

COPY $PWD/php.ini /usr/local/etc/php/

RUN docker-php-ext-install mysqli pdo pdo_mysql

ENV COMPOSER_ALLOW_SUPERUSER=1

COPY --from=composer:2.4 /usr/bin/composer /usr/bin/composer

COPY ./app/composer.* ./

RUN composer install --prefer-dist --no-dev --no-scripts --no-progress --no-interaction

WORKDIR /usr/local/apache2/htdocs

EXPOSE 9000
