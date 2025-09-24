FROM php:7.4-fpm

COPY ./php.ini /usr/local/etc/php/conf.d/php-custom.ini

RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# RUN pecl install -o -f xdebug && docker-php-ext-enable xdebug  
# если версия ниже 8.0 php , то надо ставить не последнюю версию xdebug

WORKDIR /data

VOLUME /data

CMD ["php-fpm"]
