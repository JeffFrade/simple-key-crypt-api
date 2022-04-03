#!/bin/bash

echo "##### Inicializa os Containers ######"
docker-compose up -d --build

echo "##### Copia o .env #####"
docker exec crypt-api-php-fpm cp .env.example .env

echo "##### Instala os Pacotes da Aplicação #####"
docker exec crypt-api-php-fpm composer install

echo "##### Gera a Chave da Aplicação #####"
docker exec crypt-api-php-fpm php artisan key:generate
