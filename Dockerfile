FROM php:8.1-apache
RUN apt-get update \
&& apt-get install -y \
g++ \
libicu-dev \
libpq-dev \
libzip-dev \
libcurl4-openssl-dev \
pkg-config \
libssl-dev \
zip \
zlib1g-dev \
&& docker-php-ext-install \
intl \
opcache \
pdo \
pdo_mysql \
&& a2enmod rewrite && service apache2 restart \
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer