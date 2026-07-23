#!/bin/sh
set -e

PORT="${PORT:-80}"

sed -ri "s/Listen 80/Listen ${PORT}/; s/\*:80/\*:${PORT}/" \
    /etc/apache2/ports.conf \
    /etc/apache2/sites-available/000-default.conf

php artisan config:clear
php artisan migrate --force
php artisan cache:clear
php artisan config:cache

exec apache2-foreground
