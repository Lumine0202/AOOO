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

# Copy all files into the container
COPY . .

# ✅ Create the SQLite database file so Laravel can use it
RUN mkdir -p database && touch database/database.sqlite

# Install PHP dependencies
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# ✅ Create .env from example
RUN cp .env.example .env

# Generate app key
RUN php artisan key:generate

# Set proper permissions for Laravel
RUN chmod -R 775 storage bootstrap/cache

# Use Node 18 for Vite compatibility
RUN curl -sL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs

# Build assets and show manifest for debug
RUN npm ci && npm run build && ls -l public/build

# Expose Laravel dev server port
EXPOSE 10000

# Run migrations and start the Laravel application on container start
CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=10000
