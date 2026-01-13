# Use official PHP image with extensions
FROM php:8.4-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    nano \
    vim \
    sudo \
    libpq-dev \
    libzip-dev \
    && docker-php-ext-install pdo_mysql zip \
    && rm -rf /var/lib/apt/lists/*

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Create a non-root user (optional, safer than root)
RUN useradd -m laravel && echo "laravel ALL=(ALL) NOPASSWD:ALL" >> /etc/sudoers

USER laravel
WORKDIR /var/www/src/

# Expose port for Laravel’s built-in server
EXPOSE 8000

# Expose Nginx server
# EXPOSE 80
