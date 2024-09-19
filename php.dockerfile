FROM php:7.4-fpm

WORKDIR /var/www/

COPY . .

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin/ --filename=composer

# Arguments defined in docker-compose.yml
ARG user
ARG uid


RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpq-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    npm \
    wget \
    unzip \
    nano \
    vim \
    && docker-php-ext-install zip

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd


RUN echo "max_execution_time=900" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Create system user to run Composer and Artisan Commands
# RUN useradd -G www-data,root -u $uid -d /home/$user $user

RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user


# RUN chmod -R gu+w /var/www/storage

# RUN chmod -R guo+w /var/www/storage

# RUN echo "${USER}:toor" | chpasswd

# RUN ln -s /var/www/storage/public/uploads/ public/storage

# Set working directory
WORKDIR /var/www
# COPY *.json .
# INSTALL YOUR DEPENDENCIES
ENV COMPOSER_ALLOW_SUPERUSER 1
RUN composer install

USER $user

# Run php-fpm
#   CMD ["./start_script.sh"]
