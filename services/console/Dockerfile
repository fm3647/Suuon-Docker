FROM php:7.2.7
MAINTAINER Suuon <i@suuon.com>

WORKDIR /icedata/suuon

# 기본도구
RUN apt-get update && apt-get install -y git curl wget cron vim locales libfreetype6-dev mariadb-client \
  && rm -rf /var/lib/apt/lists/* \
  && pecl install zip \
  && docker-php-ext-enable zip \
  && docker-php-ext-install mysqli pdo_mysql gd bcmath

ENV PHPREDIS_VERSION 3.0.0

RUN mkdir -p /usr/src/php/ext/redis \
    && curl -L https://github.com/phpredis/phpredis/archive/$PHPREDIS_VERSION.tar.gz | tar xvz -C /usr/src/php/ext/redis --strip 1 \
    && echo 'redis' >> /usr/src/php-available-exts \
    && docker-php-ext-install redis

RUN echo "PS1='[console]# '" >> /root/.bashrc

# 언어 한국어로 변경.
RUN dpkg-reconfigure locales && \
  locale-gen C.UTF-8 && \
  /usr/sbin/update-locale LANG=C.UTF-8
RUN echo 'ko_KR.UTF-8 UTF-8' >> /etc/locale.gen && \
  locale-gen
ENV LC_ALL C.UTF-8
ENV LANG ko_KR.UTF-8
ENV LANGUAGE ko_KR.UTF-8

# Git 설정
# RUN git config --global user.name "fm3647" \
#   && git config --global user.email "fm3647@qq.com"

# composer 설치 및 설정
# Composer 설치 https://getcomposer.org/download/
# composer 다운로드 느릴 시，하단주석 삭제하여 활성화.
COPY ./files/composer-1.6.5.phar /usr/local/bin/composer
RUN chmod +x /usr/local/bin/composer
RUN echo 'export PATH="$PATH:$HOME/.composer/vendor/bin"' >> ~/.bashrc \
  && . ~/.bashrc \
  && composer config -g repo.packagist composer https://packagist.phpcomposer.com

# 관리도구 WordPress => wp-cli
RUN curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar \
  && chmod +x wp-cli.phar \
  && mv wp-cli.phar /usr/local/bin/wp

# 관리도구 Drupal => drush
RUN php -r "readfile('http://files.drush.org/drush.phar');" > drush \
  && chmod +x drush \
  && mv drush /usr/local/bin

# 관리도구 Drupal => Drupal Console
RUN php -r "readfile('https://drupalconsole.com/installer');" > drupal \
  && chmod +x drupal \
  && mv drupal /usr/local/bin \
  && drupal self-update
