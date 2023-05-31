FROM php:8.2-rc-fpm-alpine3.17
RUN apk update
RUN apk add postgresql-dev
RUN apk add php-pdo_pgsql
RUN docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql
RUN docker-php-ext-install pdo pdo_pgsql pgsql

