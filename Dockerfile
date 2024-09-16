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

# Desativa MPMs conflitantes e ativa o prefork
RUN a2dismod mpm_event mpm_worker && a2enmod mpm_prefork

COPY . /var/www/html

WORKDIR /var/www/html

EXPOSE 80

# Configura Apache para usar a variável PORT do Heroku
ENV APACHE_PORT=${PORT:-80}
RUN sed -i "s/Listen 80/Listen ${APACHE_PORT}/" /etc/apache2/ports.conf
RUN sed -i "s/<VirtualHost \*:80>/<VirtualHost *:${APACHE_PORT}/" /etc/apache2/sites-enabled/000-default.conf

CMD ["apache2-foreground"]
