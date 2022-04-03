FROM composer:1 AS composer
FROM php:8-fpm

USER root
COPY --from=composer /usr/bin/composer /usr/bin/composer
RUN apt-get update \
    && apt-get install -y \
        net-tools \
    && useradd -m jefffrade
WORKDIR /crypt-api

RUN chown -R jefffrade:jefffrade /crypt-api
USER jefffrade
