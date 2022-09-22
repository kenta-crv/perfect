#!/bin/sh

cd /usr/share/nginx/html/src

composer install
composer dump-autoload

chmod -R 777 /usr/share/nginx/html/src/storage/

php /usr/share/nginx/html/src/artisan cache:clear
php /usr/share/nginx/html/src/artisan config:clear
php /usr/share/nginx/html/src/artisan view:clear

rm -rf /usr/share/nginx/html/src/bootstrap/cache/*.php
rm -rf /usr/share/nginx/html/src/storage/framework/cache/*.php
rm -rf /usr/share/nginx/html/src/storage/framework/views/*.php

php artisan migrate --force
php artisan view:clear
