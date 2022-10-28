---
Description: When in doubt, clear the cache. In this article, you'll learn about to clear every cache Laravel uses, but we'll also see how to clear them granularly.
Published At: 2022-09-10
Modified At: 2022-09-25
---

# 7 Laravel Artisan commands to clear the cache

![php artisan optimize:clear](https://res.cloudinary.com/benjamin-crozat/image/upload/dpr_auto,f_auto,q_auto,w_auto/v1666818684/benjamincrozat.com/bd669d2b0fca08ff03f3b8856be761c20f2e4ad7_havkj7.png)

## How to clear the cache in Laravel?

**To clear the cache in Laravel, use the `php artisan optimize:clear` command.**

This will remove:
- The config cache;
- The compiled classes cache;
- The events cache;
- The general cache (or application cache);
- The routes cache;
- The views cache.

It might be overkill, though, because it clears every existing cache Laravel uses. Let's see how to do it in a more granular way.

## Clear the application cache

First, we all know the application cache in Laravel. This is where you can store all your expensive values (meaning they take time to compute).

Depending on your cache driver (defined in your *.env* file and named `CACHE_DRIVER`), Laravel will clear files on disk or data in Redis or memcached.

```bash
php artisan cache:clear
```

## Clear the config cache

Some config values are fetched from your environment file and it can be a bit slow. Luckily, Laravel can cache them to help us speed up our applications.

When using the following command, Laravel will clear the cache by deleting *bootstrap/cache/config.php*.

```bash
php artisan config:clear
```

## Clear the events cache

[Laravel's automatic event discovery](https://laravel.com/docs/9.x/events#event-discovery) is beneficial. You don't need to register listeners manually anymore thanks to this tiny change you can make in your EventServiceProvider. Once you're into production, you can cache every implicit listener with `php artisan event:cache`.

```php
…

class EventServiceProvider extends ServiceProvider
{
    …

    public function shouldDiscoverEvents() : bool
    {
        return true;
    }
}
```

When using the following command, Laravel will clear the cache by deleting *bootstrap/cache/events.php*.

```bash
php artisan event:clear
```

## Clear the routes cache

[Laravel's routes](https://laravel.com/docs/9.x/routing) are an essential part of your web application or API. Resolving a route can take time if you have a lot of them and as you guessed, caching helps for that.

When using the following command, Laravel will clear the cache by deleting *bootstrap/cache/routes-v7.php*.

```bash
php artisan route:clear
```

## Clear the scheduled tasks cache

Let's say you have a recurring task that takes so much time to complete it will overlap with its next occurrence. You can prevent it until the previous one has finished:

```php
$schedule->command('some:task')->withoutOverlapping();
```

Behind the scenes, Laravel uses the application's cache to remember which task hasn't finished running.

```bash
php artisan schedule:clear-cache
```

## Clear the views cache

Blade directives are automatically compiled and cached as PHP files, even in your local environment. In production, you can use `php artisan view:cache` to make sure no visitor gets longer response times.

When using the following command, Laravel will clear the cache by deleting the content of *storage/views*.

```bash
php artisan view:clear
```

## Bonus: turn off the cache

To completely turn off the cache, change the cache driver to `null` in your *.env* file.

````
CACHE_DRIVER=null
```
