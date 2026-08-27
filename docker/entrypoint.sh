#!/bin/sh
set -e

# Setup SQLite database if DB_CONNECTION is sqlite
if [ "$DB_CONNECTION" = "sqlite" ] || [ -z "$DB_CONNECTION" ]; then
    echo "Configuring SQLite database..."
    export DB_CONNECTION=sqlite
    export DB_DATABASE=/var/www/database/database.sqlite
    touch /var/www/database/database.sqlite
    chmod 666 /var/www/database/database.sqlite
fi

# Ensure storage and cache directories exist and are writable
mkdir -p /var/www/storage/framework/sessions \
         /var/www/storage/framework/views \
         /var/www/storage/framework/cache \
         /var/www/storage/logs \
         /var/www/storage/app/public \
         /var/www/bootstrap/cache

chmod -R 777 /var/www/storage /var/www/bootstrap/cache /var/www/database

# Generate APP_KEY if missing
if [ -z "$APP_KEY" ]; then
    echo "Generating Application Key..."
    php artisan key:generate --force
fi

# Link storage
php artisan storage:link || true

# Run database migrations and seed if needed
echo "Running Database Migrations..."
php artisan migrate --force

# Seed database if users table is empty
USER_COUNT=$(php artisan tinker --execute="echo \App\Models\User::count();" 2>/dev/null || echo "0")
if [ "$USER_COUNT" = "0" ] || [ -z "$USER_COUNT" ]; then
    echo "Seeding initial database data..."
    php artisan db:seed --force || true
fi

# Optimize Laravel
php artisan config:cache || true
php artisan route:cache || true
php artisan view:cache || true

# Get Port (Render provides $PORT, fallback to 10000 or 8000)
PORT_NUM=${PORT:-10000}
echo "Starting DonDong Server on 0.0.0.0:$PORT_NUM..."

exec php -S "0.0.0.0:$PORT_NUM" -t public server.php
