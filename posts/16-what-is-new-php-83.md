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

Instead of using `json_decode()` to validate a JSON string, you can now use `json_validate()`. According to its [RFC](https://wiki.php.net/rfc/json_validate), it also consumes less resources.

```php
json_validate('{ "foo": "bar", }');

// Syntax error
echo json_last_error_msg();
```

As you can see, `json_validate()` returns a `boolean` and you can fetch the error message with `json_last_error()` or `json_last_error_msg()` for more details.

Read more about `json_validate()`: [PHP RFC: json_validate](https://wiki.php.net/rfc/json_validate)
