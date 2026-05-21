# How to create a docker file for a large laravel project with zip files in it

## Administration

### Change Log
Version 0.1 Draft

## Background
Image upload to Azure took hours upon hours on standard broadband connection as one layer was nearly a Gigabyte. See Dockerfile-original for the original dockerfile. There is even a 230 MB backup zip file in the repo.

## Resolution

It requires knowing what the dockerfile actually needs to work from this repo, when it is to be used to build the app on the aks container.

# ⭐ **Two ways to ensure Docker never uploads that ZIP file**


# ✅ **1. Add it to `.dockerignore`**  
This prevents Docker from even *seeing* the file during the build.

In project root, open/create:

```
.dockerignore
```

Add:

```
canarylocalbuild_v1.47.zip
*.zip
```

You can be as specific or general as you want.

This alone prevents the ZIP from entering the build context.

---

# ✅ **2. Use a proper multi-stage Dockerfile (which ignores everything except what you explicitly copy)**

The Dockerfile I gave you earlier already avoids copying random files, but let’s tighten it further.

Here is the improved version:

```
# -----------------------------------------
# Stage 1: Build PHP dependencies
# -----------------------------------------
FROM composer:2 AS vendor

WORKDIR /app

COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader --no-interaction

# -----------------------------------------
# Stage 2: Build the application
# -----------------------------------------
FROM php:8.3-fpm AS app

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev libzip-dev unzip \
    && docker-php-ext-install pdo_mysql zip

WORKDIR /var/www/html

# Copy only the necessary application files
COPY app app
COPY bootstrap bootstrap
COPY config config
COPY database database
COPY public public
COPY resources resources
COPY routes routes
COPY artisan artisan
COPY composer.json composer.lock ./

# Copy vendor from build stage
COPY --from=vendor /app/vendor ./vendor

# Laravel optimizations
RUN php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache

CMD ["php-fpm"]
```

### ⭐ Why this works

Because we **explicitly copy only the directories Laravel needs**, Docker will *never* include:

- ZIP files  
- node_modules  
- .git  
- storage/logs  
- random artifacts  
- your 230 MB ZIP  
- anything else you didn’t list  

This keeps your image tiny and clean.

---

# ⭐ **Your ZIP file will now be completely ignored**

Between:

- `.dockerignore`
- explicit COPY statements
- multi stage build

…Docker will never upload that ZIP again.

---

# ⭐ **Your new image size will drop from ~1.2 GB → ~150 MB**

Which means:

- Push time: **2–5 minutes**  
- Pull time: **seconds**  
- AKS deployment: **fast**  
- No more 966 MB layer  

This is the correct, production‑grade setup.

---

# ⭐ What you should do next

1. Add the ZIP file to `.dockerignore`
2. Replace your Dockerfile with the improved version above
3. Build the new image:

```
docker build -t blog:prod .
```

4. Tag it:

```
docker tag blog:prod acrtier4jfgwskwjhy4cu.azurecr.io/blog:prod
```

5. Push it:

```
docker push acrtier4jfgwskwjhy4cu.azurecr.io/blog:prod
```

This push will be **fast**.

---