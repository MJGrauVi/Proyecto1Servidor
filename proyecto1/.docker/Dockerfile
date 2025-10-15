FROM php:8.3-apache

RUN a2enmod rewrite

RUN apt-get update && apt-get upgrade -y && apt-get install -y \
      procps \
      nano \
      git \
      unzip \
      git-core \
      curl \
      build-essential \
      openssl \
      libssl-dev \
      libicu-dev \
      zlib1g-dev \
      libxml2 \
      libxml2-dev \
      libreadline-dev \
      supervisor \
      cron \
      sudo \
      libzip-dev \
      && docker-php-ext-configure pdo_mysql --with-pdo-mysql=mysqlnd \
      && docker-php-ext-configure mysqli \
      && docker-php-ext-configure intl \
      && docker-php-ext-install \
      pdo\
      mysqli \
      pdo_mysql \
      sockets \
      intl \
      opcache \
      zip \
      && rm -rf /tmp/* \
      && rm -rf /var/list/apt/* \
      && rm -rf /var/lib/apt/lists/* \
      && apt-get clean

WORKDIR /var/www/html
#RUN useradd mariajose && usermod -aG sudo mariajose (profe)

## Crear usuario y asignar permisos
#RUN useradd -ms /bin/bash mariajose && usermod -aG sudo mariajose \
#    && chown -R mariajose:www-data /var/www/html
# Cambiar al usuario no root
#USER mariajose


#Instalación de Composer
COPY --from=composer:2.8.11 /usr/bin/composer /usr/local/bin/composer

#Instalación de Xdebug
RUN pecl install xdebug && docker-php-ext-enable xdebug

#Instalacion de PHPUnit
RUN composer global require phpunit/phpunit && ln -s /var/www/html/vendor/bin/phpunit /usr/local/bin/phpunit


