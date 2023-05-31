FROM php:8.1-fpm-alpine


RUN apk add --no-cache nginx wget

RUN mkdir -p /run/nginx

COPY docker/nginx.conf /etc/nginx/nginx.conf

RUN mkdir -p /app
COPY . /app

RUN sh -c "wget http://getcomposer.org/composer.phar && chmod a+x composer.phar && mv composer.phar /usr/local/bin/composer"

RUN chown -R www-data: /app

CMD sh /app/docker/startup.sh



RUN cd /app && \
    /usr/local/bin/composer update && \
    /usr/local/bin/composer install


RUN docker-php-ext-install pdo_mysql

RUN chown -R www-data: /app/vendor

RUN php artisan key:generate

RUN cd /app && \
    php artisan storage:link 

RUN cd /app && \
    php artisan clear-compiled