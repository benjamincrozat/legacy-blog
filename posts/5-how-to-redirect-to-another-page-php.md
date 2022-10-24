---
Description: Redirecting a user to another page in PHP takes one line of code. That's it.
Published At: 2022-09-12
Modified At: 2022-10-23
---

# Redirect users in PHP in 3 easy steps

**To redirect users to another page in PHP, use the [`header()`](https://www.php.net/manual/en/function.header.php) function.**

## Add the "Location" header

The code below will add the "Location" header to the response sent to the your user's browser.

```php
header('Location: https://example.com/path/to/page');
```

Easy, right? There's one thing to remember going forward, though.

### Don't output text before sending headers

```php
<?php

echo 'Hello, World!';

header('Location: https://example.com/some/page');
```

This will result in a warning:

```
Warning: Cannot modify header information - headers already sent by
```

## Stop code execution

Most of the time, you will need to stop code execution with the [`exit()`](https://www.php.net/exit) function. Here's an example:

```php
<?php

if (! empty($_POST['redirect'])) {
    header('Location: https://example.com/some/page');

    exit;
}

// The following code will never be executed thanks to exit().
```

## Set the correct HTTP code

The `header()` function can take a third parameter. Using PHP named arguments, we can set it to another HTTP code. For instance, when you add a `Location` header, the HTTP code will automatically be set to `302`. But what if we want to perform a 301 redirect instead?

```php
header('Location: https://example.com/some/page', response_code: 301);
```

In the next section, I will talk about the difference between HTTP codes `301` and `302`.

### What's the difference between 301 and 302 redirects?

**The HTTP `301` code means the resource has been moved permanently**; Some use cases include:
- Redirect from HTTP to HTTPS;
- Redirect from www to non-www URLs;
- Redirect old URLs to new ones (we don't want people to stumble upon dead links). This is useful when migrating to a new domain.

**The HTTP `302` code means the resource has been moved temporarly**. The most common uses cases are for SEO (I couldn't find anything else):
- You have a promotion for a product and you want to redirect your visitors to it for a limited time, while preserving the ranking of your page on search engines results pages (or SERPs, for SEO nerds out there);
- A product is sold out, we need to redirect users to a new one for a limited time;
- A/B testing. You want to redirect some visitors to a another page, still without affecting your ranking.
