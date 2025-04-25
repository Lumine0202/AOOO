# Use the official PHP image with required extensions
FROM php:8.2-fpm

# Set working directory
WORKDIR /var/www/html

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    sqlite3 \
    libsqlite3-dev

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy existing application directory contents
COPY . .

# Install PHP dependencies
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Create SQLite file if it doesn't exist
RUN touch database/database.sqlite

# Set permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database

# Generate application key
RUN php artisan key:generate

# Run migrations (temporarily here just to get you running)
RUN php artisan migrate --force

# Expose port 8000
EXPOSE 8000

# Start the Laravel server
CMD php artisan serve --host=0.0.0.0 --port=8000
