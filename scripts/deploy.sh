#!/bin/bash 

  

echo "Starting deployment..." 

  

# 1. Upload latest code 

echo "Pulling latest code from Git..." 

git pull origin fastcomet 

  

# 2. Swap environment file 

echo "Updating environment file..." 

if [ -f .env.production ]; then 

    cp .env.production .env 

    echo ".env.production copied to .env" 

else 

    echo ".env.production not found!" 

    exit 1 

fi 

  

# 3. Clear Laravel caches using PHP 8.4 

PHP84="/opt/alt/php84/usr/bin/php" 

  

echo "Clearing Laravel caches..." 

$PHP84 artisan config:clear 

$PHP84 artisan cache:clear 

$PHP84 artisan route:clear 

$PHP84 artisan view:clear 

$PHP84 artisan optimize:clear 

  

# 4. Rebuild config cache 

echo "Rebuilding config cache..." 

$PHP84 artisan config:cache 

  

# 5. Recreate storage symlink 

echo "Ensuring storage symlink exists..." 

rm -f public/storage 

$PHP84 artisan storage:link 

  

echo "Deployment complete!" 
