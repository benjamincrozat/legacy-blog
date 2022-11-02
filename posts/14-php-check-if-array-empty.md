---
Description: There are multiple ways to check if an array is empty. Let me tell you about each of them and why and when you should use them.
Image: https://res.cloudinary.com/benjamin-crozat/image/upload/dpr_auto,f_auto,q_auto,w_auto/v1667428917/confused_xxboi4.jpg
Published At: 2022-10-09
Modified At: 2022-10-23
---

# 4 ways to check if an array is empty in PHP

![Confused person.](https://res.cloudinary.com/benjamin-crozat/image/upload/dpr_auto,f_auto,q_auto,w_auto/v1667428917/confused_xxboi4.jpg)

## The `empty()` function

The [`empty()`](https://www.php.net/empty) function determines if a value is empty or not. It simply returns `true` if it's empty, or `false` if it's not.

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

## The `count()` function

The [`count()`](https://www.php.net/count) function counts the number of entries in an array and returns it as an integer.

You can even use it with [Countable](https://www.php.net/manual/en/class.countable.php) objects.

```php
// 3    
echo count(['Foo', 'Bar', 'Baz']);
```

For multidimensional arrays, there's a second parameter for which you can use the `COUNT_RECURSIVE` constant to recursively count the numbers of items.

```php
$array = [
    'Foo' => [
        'Bar' => ['Baz'],
    ],
];

// 1
$count = count($array);

// 3
$count = count($array, COUNT_RECURSIVE);

// If $count is greater than zero, then your array is not empty.
if ($count > 0) {
    //
}
```

## The `sizeof()` function

[`sizeof()`](https://www.php.net/sizeof) is an alias of count(). [PHP actually has a lot of aliases for various functions](https://www.php.net/manual/en/aliases.php).

There's nothing to add, [you already know how to use it](#the-count-function):

```php
// 3    
echo sizeof(['Foo', 'Bar', 'Baz']);
```

## The not (`!`) operator

This one is simple. You are probably used to the not (`!`) operator. I didn't know it could check for empty arrays, but here I am, after 16 years of PHP learning yet another basic thing.

```php
$foo = [];

if (! $foo) {
    echo '$foo is empty.';
}
```
