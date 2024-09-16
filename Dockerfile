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

CMD ["apache2-foreground"]
