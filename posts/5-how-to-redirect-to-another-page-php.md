---
Description: Redirecting a user to another page in PHP takes one line of code. We'll also see the importance of HTTP and the difference between 301 and 302 redirects.
Published At: 2022-09-12
Modified At: 2022-10-05
---

# Redirect users to another page in PHP, the right way

**To redirect users to another page in PHP, use the [`header()`](https://www.php.net/manual/en/function.header.php) function.**

But if you want to understand what you're doing, we need to learn about HTTP first.

## Basics first: what is HTTP?

The communication between a browser and a server or vice-versa occurs via the HTTP protocol. An HTTP message is composed of headers and a body. Here's the anatomy of an HTTP request:

```
HTTP/<HTTP version> <HTTP code> <HTTP code description>
Some-Header: Some value
Some-Other-Header: Some other value

Some data.
```

It's that easy.

Here is the (simplified) HTTP response our browser receives when we visit my awesome website:

```
HTTP/1.1 200 OK
Content-Type: text/html; charset=UTF-8

<!DOCTYPE html>
<html>
    <head>
        <title>My Awesome Website</title>
    </head>
    <body>
        <h1>Welcome to my awesome website!</h1>
    </body>
</html>
```

Yep, you are looking at a web page in its rawest form, haha! 😅 This is what the browser receives when you hit any URL.

Notice the first line. You can read "200 OK", meaning that the web page has no problem and everything works perfectly. There are plenty of codes, and you can find them on [Wikipedia](https://en.wikipedia.org/wiki/List_of_HTTP_status_codes).

## What's the HTTP message for redirections?

If you try to hit the URL https://www.benjamincrozat.com with your web browser, you are redirected to https://benjamincrozat.com. Here's the simplified HTTP message (I got it using an HTTP client):

```
HTTP/1.1 301 Moved Permanently
Content-Type: text/html
Location: https://benjamincrozat.com/

<html>
<head><title>301 Moved Permanently</title></head>
<body>
<center><h1>301 Moved Permanently</h1></center>
<hr><center>nginx/1.20.1</center>
</body>
</html>
```

As you can see, it's pretty basic. The key header here is "Location", which is the one we need to specify the URL we want to redirect to. In the body, the HTML is not essential, but if your HTTP client or web browser doesn't follow redirections (yep, they can ignore them given the right settings), at least you'll know what's going on.

In the next section, we'll see how to construct our HTTP message with PHP and which HTTP code we need to use.

## Use PHP to redirect users

Adding headers to the HTTP response that will be sent to the browser with PHP is a straightforward process.

Here are the steps we need to take:
1. Send the header;
2. Stop code execution with the [`exit()`](https://www.php.net/exit) function (or your visitor will be redirected after the code has finished running);

The function to add headers is pretty damn easy to remember: [`header()`](https://www.php.net/manual/en/function.header.php)

```php
<?php

header('Location: https://example.com/some/page');

exit;

// The following code will never be executed.

do_something();
```

Be careful, echoing text before you send headers isn't advised!

```php
<?php

echo 'Hello, World!';

header('Location: https://example.com/some/page');
```

This will result in a warning:

```
Warning: Cannot modify header information - headers already sent by
```

## The difference between 301 and 302 redirects?

- **The HTTP 301 code means the resource has been moved permanently**; Some use cases include:
    - Redirect from HTTP to HTTPS;
    - Redirect from www to non-www URLs;
    - Redirect old URLs to new ones (we don't want people to stumble upon dead links). This is useful when migrating to a new domain;
- **The HTTP 302 code means the resource has been moved temporarly**. The most common uses cases are for SEO (I couldn't find anything else):
    - You have a promotion for a product and you want to redirect your visitors to it for a limited time, while preserving the ranking of your page on search engines results pages (or SERPs, for SEO nerds out there);
    - A product is sold out, we need to redirect users to a new one for a limited time;
    - A/B testing. You want to redirect some visitors to a another page, still without affecting your ranking.

When using `header()` with the "Location" header in PHP, a 302 Moved Temporarily redirection will be performed.

But as you saw, we mostly need 301 Moved Permanently redirects.

Since PHP 5.4, we can use the [`http_response_code()ˋ](https://www.php.net/manual/en/function.http-response-code.php) function instead of constructing the entire HTTP message ourselves:

```php
http_response_code(301);

header('Location: https://example.com/some/page');
```
