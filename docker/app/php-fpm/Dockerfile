# FROM php:8.0.7-fpm-alpine3.13
FROM php:7.4-fpm-alpine
#app source
WORKDIR /var/www/html
COPY . /var/www/html

COPY ./docker/app/php-fpm/php.ini /usr/local/etc/php/php.ini

# Node.js
ARG node_ver=14.15.1
ARG node_path=/usr/local/lib/nodejs
ARG node_file_name=node-v${node_ver}-linux-x64
ENV PATH ${node_path}/${node_file_name}/bin:$PATH
RUN curl https://nodejs.org/dist/v${node_ver}/${node_file_name}.tar.xz > ${node_file_name}.tar.xz \
    && mkdir -p $node_path \
    && tar xJvf ${node_file_name}.tar.xz -C $node_path

# install dependent packages...
RUN apk update \
    && apk add autoconf build-base \
    && apk add --no-cache libzip-dev icu-libs zlib-dev \
    && apk add --no-cache zip unzip \
    && apk add --no-cache --virtual build-dependencies icu-dev jpeg-dev \
    && apk add --no-cache freetype-dev libjpeg-turbo-dev libgcc libgomp libmcrypt-dev libpng-dev \
    && pecl install xdebug \
    # PHP intl PDO MySQL
    && docker-php-ext-install intl pdo_mysql \
    # PHP GD
    && apk add libwebp-dev zlib-dev libxpm-dev \
    && apk add --no-cache libpng && docker-php-ext-install gd && apk del
    # ImageMagick

# provide root permission to composer
ENV COMPOSER_ALLOW_SUPERUSER 1 \
    COMPOSER_NO_INTERACTION 1

# install composer...
COPY --from=composer:2.0 /usr/bin/composer /usr/bin/composer

RUN set -xeu
