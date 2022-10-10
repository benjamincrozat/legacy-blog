---
Description: PHP 8.3 will be released in November 2023 and as usual, you need to be upn to date with new features and breaking changes for easy transitions.
Published At: 2022-10-10
Modified At:
---

# What's new in PHP 8.3? Take a sneak peek.

PHP is an open source project. Knowing what's up for the next release only takes a minute of research to find this official page listing all the [accepted RFCs](https://wiki.php.net/rfc).

If this is a bit too early for you, I also wrote about [what's new in PHP 8.2](https://benjamincrozat.com/what-is-new-php-82).

## When will PHP 8.3 be released?

**PHP 8.3 will likely be released in November 2023.**

## json_validate()

```php
$json = <<<JSON
{
    "foo": "bar"
}
JSON;

// true
json_validate($json);
```
