---
Description: Knowing how to get the Laravel version you are running is incredibly important before you do anything on any project. There are multiple ways to check this information.
Published At: 2022-09-10
Modified At:
---

# 3 easy ways to check which Laravel version you are running

As soon as you get a new Laravel project to work on, the first thing you should do is to check which version you are running. For instance, you may need to install a new package and you want to make sure it is compatible with your version of Laravel.

## Check which Laravel version you are running on Laravel 9 and later

The about command gives you the Laravel version you are running as well as a lot of other information about your project.

```
php artisan about

Environment ................................................................  
Application Name ........................................... Benjamin Crozat  
Laravel Version ..................................................... 9.29.0  
PHP Version ......................................................... 8.1.10  
Composer Version ..................................................... 2.4.1  
Environment .......................................................... local  
Debug Mode ......................................................... ENABLED  
URL .................................................... benjamincrozat.test  
Maintenance Mode ....................................................... OFF  

Cache ......................................................................  
Config .......................................................... NOT CACHED  
Events .......................................................... NOT CACHED  
Routes .......................................................... NOT CACHED  
Views ............................................................... CACHED  

Drivers ....................................................................  
Broadcasting ........................................................... log  
Cache ................................................................ redis  
Database ............................................................. mysql  
Logs ........................................................ stack / single  
Mail .................................................................. smtp  
Queue ................................................................. sync  
Session .............................................................. redis
```

## Check which Laravel version you are running on any Laravel version

Before Laravel blessed us with the `about` command, it was also possible to check your project's Laravel version like so:

```
php artisan --version

Laravel Framework 9.29.0
```

## Check which Laravel version you are running with code on any Laravel version

The [`app()`](https://laravel.com/docs/helpers#method-app) helper will give you access to many information, such as the Laravel version you are running.

```php
// 9.28.0
app()->version();
```
