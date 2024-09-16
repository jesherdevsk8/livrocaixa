FROM php:8.4-rc-apache

ENV LANG C.UTF-8
ENV TZ=America/Sao_Paulo

RUN apt-get update && \
    apt-get install -y \
        libzip-dev \
        unzip \
        libpq-dev \
        && docker-php-ext-install zip pdo_pgsql && \
    cp /usr/share/zoneinfo/$TZ /etc/localtime && \
    echo $TZ > /etc/timezone

COPY . /var/www/html

WORKDIR /var/www/html

EXPOSE 80

# Configura Apache para usar a variável PORT do Heroku
ENV APACHE_PORT=${PORT:-80}

CMD ["apache2-foreground"]
