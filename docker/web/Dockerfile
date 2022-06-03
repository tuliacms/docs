FROM php:8.1-fpm

ARG USER_ID
ARG GROUP_ID

RUN addgroup --gid $GROUP_ID user
RUN adduser --disabled-password --gecos '' --uid $USER_ID --gid $GROUP_ID user

RUN apt-get update
RUN apt-get upgrade -y
RUN apt-get install libonig-dev

# Install dependency free extensions
RUN docker-php-ext-install mbstring

# Installing ZIP
RUN apt-get install zip unzip
RUN apt-get install -y zlib1g-dev libzip-dev
RUN docker-php-ext-configure zip
RUN docker-php-ext-install zip

# Allow access to root dir
RUN chown -R www-data:www-data /var/www

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
