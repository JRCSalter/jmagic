FROM php:8.3.1-fpm

COPY $PWD/php.ini /usr/local/etc/php/

# Need to install this to get PDO working properly
RUN docker-php-ext-install mysqli pdo pdo_mysql

WORKDIR /usr/local/apache2/htdocs

EXPOSE 9000
