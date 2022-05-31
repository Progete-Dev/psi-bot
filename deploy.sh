# down for update
php artisan down

# Pull the latest changes from the git repository
git pull

# Install/update composer dependencies
COMPOSER_ALLOW_SUPERUSER=1
composer install --no-interaction --prefer-dist --optimize-autoloader --no-dev
# Run database migrations
php artisan migrate --force

# Clear caches
php artisan optimize:clear
# Clear expired password reset tokens
php artisan auth:clear-resets

## Up api
php artisan up;