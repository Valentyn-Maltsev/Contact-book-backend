FROM php:8.1-fpm

RUN apt update \
    && apt install -y zlib1g-dev g++ git libicu-dev zip libzip-dev zip \
    && docker-php-ext-install intl opcache pdo pdo_mysql \
    && pecl install apcu \
    && docker-php-ext-enable apcu \
    && docker-php-ext-configure zip \
    && docker-php-ext-install zip

WORKDIR /app

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN curl -sS https://get.symfony.com/cli/installer | bash
RUN mv /root/.symfony5/bin/symfony /usr/local/bin/symfony




#FROM php:8-fpm
#
#RUN apt-get update && apt-get install -y \
#    libpq-dev \
#    wget \
#    zlib1g-dev \
#    libmcrypt-dev \
#    libzip-dev
#
#RUN docker-php-ext-install pdo pdo_mysql
#
## PHP GD (library for working with images)
#RUN apt-get install -y libpng-dev  &&  docker-php-ext-install gd
#
#RUN wget https://getcomposer.org/download/2.2.0/composer.phar \
#    && mv composer.phar /usr/bin/composer && chmod +x /usr/bin/composer
#
#RUN curl -sS https://get.symfony.com/cli/installer | bash
#
#RUN apt-get update && \
#    apt-get upgrade -y && \
#    apt-get install -y git \
#    zlib1g-dev \
#    libzip-dev \
#    unzip
#
#RUN docker-php-ext-install zip
#
#RUN composer create-project symfony/skeleton:"6.2.*" app
#
#WORKDIR /app

