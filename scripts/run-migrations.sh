#!/bin/sh

echo "Running Laravel migrations..."
php artisan migrate --force

echo "Seeding database..."
php artisan db:seed --force

echo "Done."

