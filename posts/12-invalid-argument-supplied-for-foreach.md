---
Description: Learn why the "Invalid argument supplied for foreach()" warning happens, and let me show you multiple ways to fix it.
Published At: 2022-10-07
Modified At:
---

# Quickly fix "Invalid argument supplied for foreach()" in PHP

![Illustration of "Invalid argument supplied for foreach()".](https://res.cloudinary.com/benjamin-crozat/image/upload/dpr_auto,f_auto,q_auto,w_auto/v1665149763/benjamincrozat.com/warning-invalid-argument_uedqum.png)

## Why does the "Invalid argument supplied for foreach()" warning occurs?

**The *"Invalid argument supplied for foreach()"* warning occurs when you pass something other than an array or an object to `foreach`.**

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
