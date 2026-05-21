#!/bin/bash

echo "Cleaning Windows artifacts..."

rm -rf vendor
rm -rf node_modules
rm -rf public/build
rm -rf storage
rm -rf bootstrap/cache/*.php

echo "Recreating Laravel directories..."
mkdir -p bootstrap/cache
mkdir -p storage/logs
mkdir -p storage/framework/cache
mkdir -p storage/framework/sessions
mkdir -p storage/framework/views

chmod -R 775 bootstrap/cache storage

echo "Installing PHP dependencies..."
composer install --no-dev --optimize-autoloader

echo "Installing JS dependencies..."
npm install
npm run build

echo "Cleanup complete."
