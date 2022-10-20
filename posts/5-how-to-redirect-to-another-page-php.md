---
Description: Redirecting a user to another page in PHP takes one line of code. That's it.
Published At: 2022-09-12
Modified At: 2022-10-18
---

# Redirect users to other pages in PHP

**To redirect users to another page in PHP, use the [`header()`](https://www.php.net/manual/en/function.header.php) function.**

## Add the "Location" header

The code below will add the "Location" header to the response sent to the your user's browser.

```php
header('Location: https://example.com/path/to/page');
```

## Stop code execution

We can also stop code execution with the [`exit()`](https://www.php.net/exit) function.

```php
<?php

header('Location: https://example.com/some/page');

exit;

// The following code will never be executed.
```

## Don't output text before sending headers

Be careful, outputing text before you send headers isn't advised!

```php
<?php

echo 'Hello, World!';

header('Location: https://example.com/some/page');
```

This will result in a warning:

```
Warning: Cannot modify header information - headers already sent by
```

## Use modern PHP to construct your HTTP response

Since PHP 5.4, we can use the [`http_response_code()ˋ](https://www.php.net/manual/en/function.http-response-code.php) function instead of constructing the entire HTTP message ourselves:

```php
http_response_code(301);

header('Location: https://example.com/some/page');
```
