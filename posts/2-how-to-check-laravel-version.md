---
Description: Knowing how to get the Laravel version you are running is important before starting to write code on a project. There are multiple ways to get check it.
Published At: 2022-09-10
Modified At:
---

# 4 easy ways to check which Laravel version you are running

**To check which Laravel version you are using, the quickest way to do it is to use the `php artisan --version` command.**

But there are multiple other ways to do it. Let's review them.

## Use the about command

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

## Use the --version flag

Before Laravel blessed us with the `about` command, it was also possible to check your project's Laravel version like so:

```
php artisan --version

Laravel Framework 9.29.0
```

## Use the app() helper

The [`app()`](https://laravel.com/docs/helpers#method-app) helper will give you access to many information, such as the Laravel version you are running. Try this simple code below:

```php
// 9.28.0
app()->version();
```

## Check inside the composer.json and composer.lock files

In your *composer.json*, you will be able to get the minimum version of Laravel your project is locked on:

```json
"require": {
    "php": "^8.0.2",
    "guzzlehttp/guzzle": "^7.2",
    "laravel/framework": "^9.19",
    "laravel/sanctum": "^3.0",
    "laravel/tinker": "^2.7"
},
```

As you can see, this project is locked on Laravel 9.19.0 or earlier.

But this might not be enough. Search for "laravel/framework" inside your *composer.lock* file to get the exact Laravel version that's installed on your project :

```json
{
    "name": "laravel/framework",
    "version": "v9.30.0",
    "source": {
        "type": "git",
        "url": "https://github.com/laravel/framework.git",
        "reference": "2ca2b168a3e995a8ec6ea2805906379095d20080"
    }
}
```
