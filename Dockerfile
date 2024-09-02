FROM php:8.4-rc-apache

ENV LANG C.UTF-8
ENV TZ=America/Sao_Paulo

RUN apt-get update && \
    apt-get install -y \
        libzip-dev \
        unzip \
        && docker-php-ext-install zip pdo_mysql && \
    cp /usr/share/zoneinfo/$TZ /etc/localtime && \
    echo $TZ > /etc/timezone

COPY . /var/www/html

WORKDIR /var/www/html

EXPOSE 80

CMD ["apache2-foreground"]
