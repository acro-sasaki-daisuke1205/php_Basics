FROM php:8.0.0-apache

RUN apt-get update && \
    docker-php-ext-install mysqli && \
    pecl install xdebug