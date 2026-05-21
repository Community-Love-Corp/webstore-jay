## 1.0 SQL queries from Laravel interface

1. Tinker to query SQL

```bash
php artisan tinker
```

Then:

```php
Page::where('slug', 'resilience')->first()->content;
```

2. List Routes

```
C:\Users\moose\git\blog-systematicdefence-tech>php artisan route:list

  GET|HEAD  / ........................................... routes/web.php:8
  POST      _boost/browser-logs boost.browser-logs › vendor/laravel/boost…
  POST      admin/pages ........ app\Http\Controllers\PageController@store
  GET|HEAD  admin/pages/create app\Http\Controllers\PageController@create
  PUT       admin/pages/{page} pages.update › app\Http\Controllers\PageCo…
  GET|HEAD  admin/pages/{page}/edit pages.edit › app\Http\Controllers\Pag…
  POST      admin/upload-image ......................... routes/web.php:27
  POST      admin/upload-media ......................... routes/web.php:43
  POST      comment comment.store › app\Http\Controllers\CommentControlle…
  GET|HEAD  pages/{page} ........ app\Http\Controllers\PageController@show
  GET|HEAD  storage/{path} storage.local › vendor/laravel/framework/src/I…
  PUT       storage/{path} storage.local.upload › vendor/laravel/framewor…
  GET|HEAD  up vendor/laravel/framework/src/Illuminate/Foundation/Configu…
```