FROM php:7.2.7-fpm
MAINTAINER suuon <i@suuon.com>

ENV PHPREDIS_VERSION 3.0.0

RUN mkdir -p /usr/src/php/ext/redis \
    && curl -L https://github.com/phpredis/phpredis/archive/$PHPREDIS_VERSION.tar.gz | tar xvz -C /usr/src/php/ext/redis --strip 1 \
    && echo 'redis' >> /usr/src/php-available-exts \
    && docker-php-ext-install redis

# 잠시 숨김: 확장설치 최신버전 버그.
RUN apt-get update && apt-get install -y libpng-dev libjpeg-dev \
    && rm -rf /var/lib/apt/lists/* \
    # && pecl install zip \
    # && docker-php-ext-enable zip \
    && docker-php-ext-configure gd --with-png-dir=/usr --with-jpeg-dir=/usr \
    && docker-php-ext-install gd mysqli pdo_mysql zip opcache redis bcmath

COPY ./config/php.ini /usr/local/etc/php/conf.d/
COPY ./config/opcache-recommended.ini /usr/local/etc/php/conf.d/