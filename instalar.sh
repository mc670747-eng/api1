#!/bin/bash

echo "================================="
echo " INSTALADOR API1 LARAVEL "
echo "================================="

apt update -y
apt upgrade -y

apt install -y \
apache2 \
git \
curl \
unzip \
composer \
php \
php-cli \
php-common \
php-mysql \
php-mbstring \
php-xml \
php-curl \
php-zip \
php-bcmath \
libapache2-mod-php \
nodejs \
npm

cd /var/www

git clone https://github.com/mc670747-eng/api1.git

cd api1

composer install --no-interaction

cp .env.example .env

php artisan key:generate

npm install

npm run build

chmod -R 775 storage
chmod -R 775 bootstrap/cache

echo "================================="
echo " INSTALACION FINALIZADA "
echo "================================="
