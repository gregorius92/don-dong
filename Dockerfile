FROM php:8.4-cli

# Set working directory
WORKDIR /var/www

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    libpq-dev \
    sqlite3 \
    libsqlite3-dev \
    zip \
    unzip \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions for SQLite, MySQL, and PostgreSQL
RUN docker-php-ext-install \
    pdo_mysql \
    pdo_sqlite \
    pdo_pgsql \
    mbstring \
    exif \
    pcntl \
    bcmath \
    gd \
    zip

# Get Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copy application files
COPY . /var/www

# Install Composer dependencies
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Ensure permissions
RUN chmod +x /var/www/docker/entrypoint.sh \
    && mkdir -p /var/www/database \
    && chmod -R 777 /var/www/storage /var/www/bootstrap/cache /var/www/database

# Expose Render default port
EXPOSE 10000

ENTRYPOINT ["/var/www/docker/entrypoint.sh"]
