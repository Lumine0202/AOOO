# Use official PHP image with required extensions
FROM php:8.2

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    zip unzip curl sqlite3 libsqlite3-dev \
    && docker-php-ext-install pdo pdo_sqlite

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy all files to container
COPY . .

# Install PHP dependencies
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# ✅ Create .env from example to avoid artisan crash
RUN cp .env.example .env

# Generate app key
RUN php artisan key:generate

# Set permissions for Laravel
RUN chmod -R 775 storage bootstrap/cache

# Expose port for Laravel dev server
EXPOSE 10000

# Start Laravel dev server
CMD php artisan serve --host=0.0.0.0 --port=10000
