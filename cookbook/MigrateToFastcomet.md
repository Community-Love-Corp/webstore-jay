<div align="center" style="color: red;">
  © Jyotirmay Sarna. This work is original. Please Do not copy, repost or use without permission.
</div>

# Migrate Laravel project to Fastcomet

## 1.0 Summary


1. Upload the **entire Laravel project** (not just `public/`)  
2. Point **domain/subdomain document root** to `/public`  
3. Configure `.env` with FastComet MySQL  
4. Run `composer install` on FastComet  
5. Set correct permissions  
6. Run migrations  


## Administration

### Change Log

| Version | Author        | Date       | Description                          
|---------|---------------|------------|--------------------------------------|
|  1.0    | BoundlessLove | 6 May 2026 | First Release to Production          


## Background: 

### What's Possible
FastComet supports:

- PHP 8.1 / 8.2  
- Composer  
- SSH  
- MySQL  
- Cron jobs  
- Queue workers (with some limitations)  

It runs:

- Laravel 8  
- Laravel 9  
- Laravel 10  
- Laravel 11  

### What is not possible?

Fastcomet is shared hosting. So:

- No Supervisor for queue workers  
- No WebSockets  
- No Octane  
- No Redis (unless using remote Redis)  
- No root access  

But for **normal Laravel apps**, it works perfectly.


## **How to deploy local Laravel project to FastComet (clean steps)**

### **1. Upload Laravel project**
Upload entire project to:

```
/home/USERNAME/laravel/
```

Example:

```
/home/systema1/laravel/
```

Do **NOT** put the whole project inside `public_html`.

---

### **2. Point domain/subdomain to the Laravel public folder**
In FastComet cPanel:

**Domains → Subdomains → Document Root**

Set it to:

```
/home/USERNAME/laravel/public
```

This is essential — Laravel must expose only the `public` folder.

---

### **3. SSH into FastComet and run Composer**
FastComet supports Composer.

SSH:

```bash
cd ~/laravel
composer install
```

This installs:

- vendor folder  
- autoload  
- framework dependencies  

---

### **4. Upload `.env`**
Then edit it with FastComet DB credentials:

```
DB_CONNECTION=mysql
DB_HOST=mysql###.fastcomet.com
DB_PORT=3306
DB_DATABASE=yourdb
DB_USERNAME=youruser
DB_PASSWORD=yourpass
```

---

## **5. Generate Laravel key**
SSH:

```bash
php artisan key:generate
```

---

## **6. Run migrations**
SSH:

```bash
php artisan migrate
```

Setup seeders:

```bash
php artisan db:seed
```

---

## **7. Set permissions**
FastComet requires:

```bash
chmod -R 775 storage bootstrap/cache
```

---

