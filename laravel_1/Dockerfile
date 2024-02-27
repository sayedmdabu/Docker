# Use Alpine Linux as base image
FROM php:8.2-fpm-alpine

# Copy composer.lock and composer.json
COPY src/composer.lock src/composer.json /var/www/

# Set working directory
WORKDIR /var/www

# Install dependencies
RUN apk update && apk add --no-cache \
    build-base \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    libzip-dev \
    oniguruma-dev \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    libzip \
    libgd \
    freetype \
    libjpeg-turbo \
    libpng

# Clear cache
RUN rm -rf /var/cache/apk/*

# Install PHP extensions
RUN docker-php-ext-install bcmath pdo_mysql mbstring zip exif pcntl gd

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Add user for Laravel application
RUN addgroup -g 1000 www && adduser -u 1000 -D -G www www

# Copy existing application directory contents
COPY . /var/www

# Install Composer dependencies
RUN composer install --no-dev --optimize-autoloader

# Copy existing application directory permissions
COPY --chown=www:www . /var/www

# Change current user to www
USER www

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]
