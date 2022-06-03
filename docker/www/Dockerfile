FROM php:8.1-apache
ARG USER_ID
ARG GROUP_ID

RUN addgroup --gid $GROUP_ID user
RUN adduser --disabled-password --gecos '' --uid $USER_ID --gid $GROUP_ID user

RUN apt-get update
RUN apt-get upgrade -y
RUN apt-get install libonig-dev git -y

# Install dependency free extensions
RUN docker-php-ext-install mbstring

# Installing XML
RUN apt-get install -y libxml2-dev
RUN docker-php-ext-install xml

## xdebug 3
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

# Enable mod_rewrite
RUN a2enmod rewrite

# Allow access to root dir
RUN chown -R www-data:www-data /var/www/html

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
