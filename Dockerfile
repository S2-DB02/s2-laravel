FROM php:7.4-fpm

# Arguments defined in docker-compose.yml
ARG user
ARG uid

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Create system user to run Composer and Artisan Commands
RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

#RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
#RUN docker-php-ext-install pdo mbstring

# Set working directory
COPY . /var/www
WORKDIR /var/www

RUN composer install
RUN php artisan db:seed --class=AdminSeeder

USER $user


# Dockerfile
#FROM php:7.2-cli

#RUN apt-get update -y && apt-get install -y libmcrypt-dev

#RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
#RUN docker-php-ext-install pdo mbstring

#WORKDIR /app
#COPY . /app

#RUN composer install
#RUN php artisan db:seed --class=AdminSeeder
#EXPOSE 8000
#CMD php artisan serve --host=0.0.0.0 --port=8000
