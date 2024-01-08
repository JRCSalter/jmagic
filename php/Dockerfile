FROM php:7.4-fpm

RUN mkdir -p /var/www/html

COPY $PWD/php.ini /usr/local/etc/php/

WORKDIR /usr/local/apache2/htdocs

EXPOSE 9000
