---
Description: Learn why the "Invalid argument supplied for foreach()" warning happens, and let me show you multiple ways to fix it.
Published At: 2022-10-07
Modified At:
---

# Fix "Invalid argument supplied for foreach" in PHP & Laravel

## Why does the "Invalid argument supplied for foreach()" warning occurs?

**The *"Invalid argument supplied for foreach()"* warning occurs when you try to iterate over something other than an array or an object.**

On PHP 8+, the warning has been rewritten to "foreach() argument must be of type array|object".

Whatever version of PHP you're on, you need to ensure that an array or an object is always passed to `foreach`.

## Use the null coalescing operator

When you cannot be certain that you'll get an array or null, you can use the null coalescing operator to ensure an array will always be passed to `foreach`.

```php
foreach ($value ?? [] as $item) {
    …
}
```

## Check if your value is iterable

One of the safest way to go is to use the [`is_iterable()`](https://www.php.net/is_iterable) function. It checks for either:
- An array;
- A [Traversable](https://www.php.net/manual/en/class.traversable.php) object.

```php
if (is_iterable($value)) {
    foreach ($value as $item) {
	    …
    }
}
```

## Use Laravel's collections

If you're using Laravel, you can use [collections](https://laravel.com/docs/collections) to wrap your arrays and work with safer code.

Let's say you're refactoring a poor-quality codebase and have to deal with uncertain return values. Wrapping the return value in the `collect()` helper will ensure that you always get an iterable to loop over.

```php
// The safe collect() helper.
$items = collect(
    // The unsafe method.
    $foo->getItems()
);

// Looping over $items will always work.
foreach ($items as $item) {
    //
}
```

Of course, since you're using Laravel's collections, you could refactor to their built-in methods:

```php
$items = collect(
    $foo->getItems()
);

$items->each(function ($item) {
    //
});
```
