FROM php:7.4.9-fpm-alpine3.12 as base

RUN apk add --no-cache shadow openssl bash mysql-client nodejs npm git
RUN docker-php-ext-install pdo pdo_mysql

#RUN touch /home/www-data/.bashrc | echo "PS1='\w\$ '" >> /home/www-data/.bashrc

#RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN usermod -u 1000 www-data

WORKDIR /var/www

RUN rm -rf /var/www/html && ln -s public html

USER www-data

#RUN composer global require hirak/prestissimo

EXPOSE 9000


FROM base as builder
USER root

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

ENV DOCKERIZE_VERSION v0.6.1
RUN wget https://github.com/jwilder/dockerize/releases/download/$DOCKERIZE_VERSION/dockerize-linux-amd64-$DOCKERIZE_VERSION.tar.gz \
    && tar -C /usr/local/bin -xzvf dockerize-linux-amd64-$DOCKERIZE_VERSION.tar.gz \
    && rm dockerize-linux-amd64-$DOCKERIZE_VERSION.tar.gz

USER www-data

#RUN composer global require hirak/prestissimo





FROM builder as dev
USER root
#ENV DOCKERIZE_VERSION v0.6.1
#RUN wget https://github.com/jwilder/dockerize/releases/download/$DOCKERIZE_VERSION/dockerize-linux-amd64-$DOCKERIZE_VERSION.tar.gz \
#    && tar -C /usr/local/bin -xzvf dockerize-linux-amd64-$DOCKERIZE_VERSION.tar.gz \
#    && rm dockerize-linux-amd64-$DOCKERIZE_VERSION.tar.gz

RUN touch /home/www-data/.bashrc | echo "PS1='\w\$ '" >> /home/www-data/.bashrc

RUN pecl channel-update pecl.php.net
RUN apk --no-cache add pcre-dev ${PHPIZE_DEPS} \
  && pecl install xdebug \
  && docker-php-ext-enable xdebug \
  && apk del pcre-dev ${PHPIZE_DEPS}

ADD .docker/app/.env /templates/.env
ADD .docker/app/.env.testing /templates/.env.testing
ADD .docker/app/entrypoint.sh /entrypoint.sh

RUN set -ex && apk --no-cache add sudo
RUN adduser www-data wheel && sed -e 's;^# \(%wheel.*NOPASSWD.*\);\1;g' -i /etc/sudoers

COPY ./.docker/app/ini/docker-php-ext-xdebug.ini /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

USER www-data

RUN sudo -E docker-php-ext-enable xdebug

RUN composer global require infection/infection
RUN composer global require "squizlabs/php_codesniffer=*"
RUN composer global require friendsofphp/php-cs-fixer


FROM builder as builder-ci
USER root
COPY ./www /var/www

RUN chmod 775 /var/www/ -R && \
    chmod 2775 /var/www/ -R && \
    chown -R www-data:www-data /var/www/  -R && \
    cd /var/www/ && find * -type d -exec chmod -R 775 {} \; && find * -type f -exec chmod -R 664 {} \;

ADD .docker/app/entrypoint-prod.sh /entrypoint.sh
RUN chmod a+x /entrypoint.sh
USER www-data
RUN cp /var/www/.env.example /var/www/.env

FROM builder-ci as ci
USER www-data
RUN  cp /var/www/.env.example /var/www/.env.testing
RUN composer install

FROM builder-ci as builder-prod
USER www-data
RUN composer install --no-dev
