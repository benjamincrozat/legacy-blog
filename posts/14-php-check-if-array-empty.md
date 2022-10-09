---
Description: There are multiple ways to check if an array is empty. Let me tell you about each of them and why and when you should use them.
Published At: 2022-10-09
Modified At:
---

# 2 ways to check if an array is empty

## How to check if an array is empty

**To check if an array if empty, use the empty() or count() functions.**

## The empty() function

```php
// true
var_dump(empty([]));

// false
var_dump(empty(['Foo', 'Bar', 'Baz']));
```

## The count() function

```php
// 3    
echo count(['Foo', 'Bar', 'Baz']);
```

## The sizeof() function

The sizeof() function is actually an alias of count(). There's nothing to add, [you already know how to use it](#the-count-function):

```php
// 3    
echo sizeof(['Foo', 'Bar', 'Baz']);
```
