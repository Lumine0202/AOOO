FROM php:8.2

# Install system dependencies
RUN apt-get update && apt-get install -y \
    zip unzip curl sqlite3 libsqlite3-dev \
    && docker-php-ext-install pdo pdo_sqlite

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy app files
COPY . .

# Install PHP dependencies
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Generate Laravel app key
RUN php artisan key:generate

# Set permissions (optional tweak depending on setup)
RUN chmod -R 775 storage bootstrap/cache

# Expose port 10000 and start Laravel server
EXPOSE 10000
CMD php artisan serve --host=0.0.0.0 --port=10000
