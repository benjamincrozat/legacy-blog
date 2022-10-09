---
Description: When in doubt, clear caches in Laravel. Knowing all the different types of caches will help you debug any problem you might have in your projects.
Published At: 2022-09-10
Modified At:
---

# Clear every existing cache at once in Laravel

## How to clear cache in Laravel?

<span class="text-xl">**To clear every existing cache in Laravel, use the `php artisan optimize:clear` command.**</span>

But if you want to understand what you're doing, we need to talk more deeply about all the kind of caches there are in Laravel.

## Clear the application cache

First, we all know the application cache in Laravel. This is where you can store all your expensive values (meaning they take time to compute).

Depending on your cache driver (defined in your *.env* file and named `CACHE_DRIVER`), Laravel will clear files on your disk or data in Redis or memcached.

```bash
php artisan cache:clear
```

## Clear the config cache

Some config values are fetched from your environment file and it can be a bit slow. Luckily, Laravel can cache them to help us speed up our applications.

When using the following command, Laravel will delete *bootstrap/cache/config.php*.

```bash
php artisan config:clear
```

## Clear the events cache

[Laravel's automatic event discovery](https://laravel.com/docs/9.x/events#event-discovery) is beneficial. You don't need to register listeners manually anymore thanks to this tiny change you can make in your EventServiceProvider. Once you're into production, you can cache every implicit listener.

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

When using the following command, Laravel will delete *bootstrap/cache/events.php*.

```bash
php artisan event:clear
```

## Clear the routes cache

[Laravel's routes](https://laravel.com/docs/9.x/routing) are an essential part of your web application or API. Resolving a route can take time if you have a lot of them and as you guessed, caching helps for that.

When using the following command, Laravel will delete *bootstrap/cache/routes-v7.php*.

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

Blade directives are automatically compiled and cached as PHP files, even in your local environment. You can even use `php artisan view:cache` to make sure no visitor gets longer response times.

When using the following command, Laravel will delete the content of *storage/views*.

```bash
php artisan view:clear
```

## Clear every cache at once

Finally, let's see the ultimate cache-busting command I talked about at the beginning of this article.

```bash
php artisan optimize:clear
```

This command will remove the following caches:
- Config
- Compiled classes cache
- Events
- General Cache
- Routes
- Views

How do I know that? Simple. I used the "Go To File" command in my code editor and searched for the "OptimizeClearCommand.php" file. Its source code is straightforward to understand, as you can see:

```php
…

class OptimizeClearCommand extends Command
{
    …

    public function handle()
    {
        $this->components->info('Clearing cached bootstrap files.');

        collect([
            'events' => fn () => $this->callSilent('event:clear') == 0,
            'views' => fn () => $this->callSilent('view:clear') == 0,
            'cache' => fn () => $this->callSilent('cache:clear') == 0,
            'route' => fn () => $this->callSilent('route:clear') == 0,
            'config' => fn () => $this->callSilent('config:clear') == 0,
            'compiled' => fn () => $this->callSilent('clear-compiled') == 0,
        ])->each(fn ($task, $description) => $this->components->task($description, $task));

        $this->newLine();
    }
}
```
