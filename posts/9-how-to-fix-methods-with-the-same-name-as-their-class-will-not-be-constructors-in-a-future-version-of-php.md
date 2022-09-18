---
Description: Here is the solution to fix "Methods with the same name as their class will not be constructors in a future version of PHP" warnings.
Published At: 2022-09-18
Modified At:
---

# How to fix: "Methods with the same name as their class will not be constructors in a future version of PHP"?

## Steps to fix "Methods with the same name as their class will not be constructors in a future version of PHP"

1. Grab your favorite code editor and search for class definitions across your project;
2. Check for your constructor method and change its name to `__construct` if it has the same as its class.

Your modifications should look like this:

```php
class Foo
{
    public function Foo() // [tl! --]
    public function __construct() // [tl! ++]
    {
    }
}
```

## Why is this warning occurring?

In PHP 4, a constructor is defined by using the class' name as the method's name like so:

```php
class Foo
{
    public function Foo()
    {
    }
}
```

It was still working in PHP 5, was deprecated in PHP 7, and removed in PHP 8. That is why you must rename your constructors before migrating to PHP 8.

For posterity, you can read more about it on the official PHP documentation: [Deprecated features in PHP 7.0.x ¶](https://www.php.net/manual/en/migration70.deprecated.php#migration70.deprecated.php4-constructors).

You can also see the RFC that led to this: [PHP RFC: Remove PHP 4 Constructors](https://wiki.php.net/rfc/remove_php4_constructors)
