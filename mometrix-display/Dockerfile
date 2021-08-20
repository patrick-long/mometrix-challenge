FROM php:8.0-apache

RUN apt-get update 
RUN apt-get upgrade -y

RUN docker-php-ext-install mysqli

EXPOSE 80