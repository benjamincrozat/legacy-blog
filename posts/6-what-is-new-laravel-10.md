---
Description: Laravel 10 will be released on February 7, 2023. Its development is still ongoing. Let's dive into every relevant new feature we know about already.
Published At: 2022-09-15
Modified At: 2022-10-05
---

# What's new in Laravel 10? Here's all you need to know.

![Laravel 10](https://res.cloudinary.com/benjamin-crozat/image/upload/dpr_auto,f_auto,q_auto,w_auto/v1666972278/benjamincrozat.com/laravel-10_jow67m.jpg)

## When will Laravel 10 be released?

**Laravel 10 is scheduled to be released in February 7, 2023**.

## How to install Laravel 10?

Installing Laravel 10 is easy. The Laravel installer has a `--dev` flag, which installs the *master* branch from the [laravel/laravel](https://github.com/laravel/laravel) repository.

```bash
laravel new hello-world --dev
```

## New features and changes in Laravel 10

### Dropped support for PHP 8.0

Some people are barely adopting PHP 8.0. Meanwhile, Laravel 10 will drop support for PHP 8.0, and that's good.

Remember: big enterprise apps don't need to be updated to the latest and greatest as soon as they're released. Enterprise apps have paid clients or employees depending on them to do their work. They need to slowly but surely move forward by doing extensive testing.

See the pull request on GitHub: [[10.x] Drop PHP 8.0](https://github.com/laravel/laravel/pull/5854)

### Dropped support for Predis v1

If you're forcing the usage of Predis v1 in your project, you might want to upgrade to v2.

To see what changed in Predis v2, take a look at the [changelog](https://github.com/predis/predis/blob/main/CHANGELOG.md#v200-2022-06-08).

See the pull request on GitHub: [[10.x] Drop Predis v1 support](https://github.com/laravel/framework/pull/44209)

In my opinion, instead of using Predis, you should consider using [PHP's native Redis extension](https://github.com/phpredis/phpredis), which is faster and could speed up your website if you have a lot of traffic.

### dispatchNow() has been removed

`dispatchNow()` is a popular method in Laravel. It was deprecated in Laravel 9 in favor of [`dispatchSync()`](https://laravel.com/docs/9.x/queues#synchronous-dispatching). Laravel 10 will remove it, so be sure to search and replace it in all of your projects. It may be a breaking change, but it's an extremely easy fix.

See the pull request on GitHub: [[10.x] Remove deprecated dispatchNow functionality](https://github.com/laravel/framework/pull/42591)

### Many deprecated methods and properties have been removed

Releasing a major version also means the Laravel team can finally remove features that have been deprecated in Laravel 9. It also means you should carefully test any Laravel application you might want to migrate to version 10.

Here's a list of all PRs taking care of that:
- [[10.x] Remove deprecated Route::home method](https://github.com/laravel/framework/pull/42614)
- [[10.x] Remove deprecated assertTimesSent](https://github.com/laravel/framework/pull/42592)
- [[10.x] Remove deprecated method](https://github.com/laravel/framework/pull/42590)
- [[10.x] Remove deprecated dates property](https://github.com/laravel/framework/pull/42587)
- [[10.x] Use native php 8.1 array_is_list function](https://github.com/laravel/framework/pull/41347)
- [[10.x] Remove deprecations](https://github.com/laravel/framework/pull/41136)

### Laravel 10 uses invokable validation rules by default

In Laravel 9, [invokable validation rules](https://laravel.com/docs/9.x/validation#custom-validation-rules) could be generated using the `--invokable` flag with the `php artisan make:rule` command. Starting from Laravel 10, you won't need it anymore.

```php
php artisan make:rule Uppercase
```

To remind you a bit of what invokable validation rules are, here's what they look like:

```php
namespace App\Rules;

use Illuminate\Contracts\Validation\InvokableRule;

class Uppercase implements InvokableRule
{
    /**
     * Run the validation rule.
     *
     * @param string $attribute
     * @param mixed $value
     * @param \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString $fail
     * @return void
     */
    public function __invoke($attribute, $value, $fail)
    {
        if (strtoupper($value) !== $value) {
            $fail('The :attribute must be uppercase.');
        }
    }
}
```

The boilerplate code is considerably smaller and easier to understand. Thanks to Laravel 10, people will be less intimidated by the perspective of making custom validation rules.

See the pull request on GitHub: [[10.x] Make invokable rules default](https://github.com/laravel/docs/pull/8165)

### The Laravel 10 skeleton use native types instead of docblocks

Starting with Laravel 10, the skeleton will now use native types instead of docblocks.

For instance, the `schedule()` method in *app/Console/Kernel.php* will look like this:

```diff
/**
 * Define the application's command schedule.
- * 
- * @param  \Illuminate\Console\Scheduling\Schedule  $schedule 
- * @return void 
 */
- protected function schedule($schedule)
+ protected function schedule(Schedule $schedule): void
```

See the pull request on GitHub: [[10.x] Uses PHP Native Type Declarations 🐘](https://github.com/laravel/laravel/pull/6010)

---

**This is what's new in Laravel 10 for now.**

**There's more to come until February 2023, though.**

**Don't miss any update on this post. [Subscribe to my newsletter](#newsletter) and [follow me on Twitter](https://twitter.com/benjamincrozat)!**
