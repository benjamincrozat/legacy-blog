---
Description: Correctly redirecting a user to another page in PHP only takes a few lines of code. We'll also see the difference between 301 and 302 redirects.
Published At: 2022-09-12
Modified At: 2022-09-15
---

# Redirect your visitors to another page with 3 lines of PHP

## Basics first: what is HTTP?

The communication between a browser and a server or vice-versa occurs via the HTTP protocol. An HTTP message is composed of headers and a body. Here's the anatomy of an HTTP request:

```
HTTP/<HTTP version> <HTTP code> <HTTP code description>
Some-Header: Some value
Some-Other-Header: Some other value

Some data.
```

It's that simple.

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

Using PHP to add headers to the HTTP response that will be sent to the browser is straightforward. Here are the steps we need to take:
1. Send the header;
2. Stop code execution with the [`exit()`](https://www.php.net/exit) function (or your user will be redirected after the code has finished running);

The function to add headers is pretty damn easy to remember: [`header()`](https://www.php.net/manual/en/function.header.php)

```php
<?php

header('Location: https://example.com/some/page');

exit;

// This code will never be executed.
do_something();

 // Text output should come after headers.
 // This code won't be executed either.
echo 'Hello, World!';
```

## What's the difference between 301 and 302 redirects?

By default, adding a "Location" header will result in a 302 Moved Temporarily redirect. But most of the time, we need 301 Moved Permanently redirections (the most common use case is for SEO purposes). Since PHP 5.4, we can use the [`http_response_code()ˋ](https://www.php.net/manual/en/function.http-response-code.php) function:

```php
<?php

http_response_code(301);

header('Location: https://example.com/some/page');
```

## Who or what benefits from a correct HTTP code?

- Users consuming the web API you made. They need to know when something went right or wrong and the standard way to do it is with the correct HTTP codes (200 OK, 404 Not Found, 500 Server Error, etc.);
- Google's bot trying to figure out what's happening on your website. For instance, when it sees a "301 Moved Permanently" HTTP code, it knows your page has been moved to a new location and needs to be updated in its index.

There are many other use cases I won't bother listing here, but trust me when I tell you it's crutial.
