---
Description: There are multiple ways to check if an array is empty. Let me tell you about each of them and why and when you should use them.
Published At: 2022-10-09
Modified At:
---

# 2 ways to check if an array is empty in PHP

## How to check if an array is empty in PHP

**To check if an array is empty in PHP, use the [empty()](https://www.php.net/empty) or [count()](https://www.php.net/count) functions.**

## The empty() function

The empty() function determines if a value is empty or not. It simply return `true` if it's empty, or `false` if it's not.

This is my favorite way to check if an array is empty in PHP.

```php
$foo = [];

// true
if (empty($foo)) {
    //
}

$bar = ['Foo', 'Bar', 'Baz'];

// false
if (empty($bar)) {
    //
}
```

## The count() function

```php
// 3    
echo count(['Foo', 'Bar', 'Baz']);
```

## The sizeof() function

The sizeof() function is an alias of count(). [PHP actually has a lot of aliases for various functions](https://www.php.net/manual/en/aliases.php).

There's nothing to add, [you already know how to use it](#the-count-function):

```php
// 3    
echo sizeof(['Foo', 'Bar', 'Baz']);
```
