---
Description: PHP 8.3 will be released in November 2023, and as usual, you need to be up to date with new features and breaking changes for easier transitions.
Image: https://res.cloudinary.com/benjamin-crozat/image/upload/dpr_auto,f_auto,q_auto,w_auto/v1666554116/benjamincrozat.com/php-83_p6vkhz.png
Published At: 2022-10-10
Modified At: 2022-10-19
---

# What's new in PHP 8.3? Take a sneak peek.

![Illustration of a person sitting in front of a laptop with coffee.](https://res.cloudinary.com/benjamin-crozat/image/upload/dpr_auto,f_auto,q_auto,w_auto/v1666554116/benjamincrozat.com/php-83_p6vkhz.png)

According to the [preparation tasks list](https://wiki.php.net/todo/php83), **PHP 8.3 will be released on November 23, 2023**, after three alpha releases, three beta, and six release candidates. 

PHP is an open-source project. Knowing what's going on for the next version only takes a minute of research. For instance, [this page lists all the accepted RFCs for PHP 8.3](https://wiki.php.net/rfc#php_83).

## json_validate()

Instead of using `json_decode()` to validate a JSON string, you can now use `json_validate()`. According to its [RFC](https://wiki.php.net/rfc/json_validate), it also consumes fewer resources.

```php
json_validate('{ "foo": "bar", }');

// Syntax error
echo json_last_error_msg();
```

As you can see, `json_validate()` returns a `boolean`, and you can fetch the error message with `json_last_error()` or `json_last_error_msg()` for more details.

Read more about `json_validate()`: [PHP RFC: json_validate](https://wiki.php.net/rfc/json_validate)

---

**That's it for PHP 8.3 so far. 👍**

**I will report every new accepted RFC in the coming months!**

**[Subscribe to my newsletter](#newsletter) and [follow me on Twitter](https://twitter.com/benjamincrozat) to make sure you don't miss anything!**
