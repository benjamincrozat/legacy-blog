---
Description: A server and a browser communicate through the HTTP protocol. This is how you tell your browser how to redirect the user to another page.
Published At: 2022-09-12
Modified At: 2022-09-15
---

# The easiest way to redirect your visitors in PHP

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

Yep, you are looking at a web page in its rawest form, haha! 😅

Notice the first line. You can read "200 OK", meaning that the web page has no problem and everything works perfectly. There are plenty of codes and you can find them on [Wikipedia](https://en.wikipedia.org/wiki/List_of_HTTP_status_codes).

In the next section, we'll see how to construct our HTTP message with PHP and which HTTP code we need to use.

## Use PHP for sending HTTP headers to redirect users

Using PHP to change the HTTP response and redirect users is straightforward. Here are the steps we need to take:

1. Set the correct HTTP code;
2. Send the header;
3. Once the header is sent, stop code execution (or your user will be redirected only after this code has finished running);

The function to add headers is actually pretty damn easy to remember: [`header()`](https://www.php.net/manual/en/function.header.php)

We're almost there. First, we need to talk about the HTTP code we need to use. The two most used for redirections are:
- HTTP code `301`. Meaning your page has been *permanently moved* to the URL in your "Location" header;
- HTTP code `302`. Meaning your page *temporarly redirects* to the URL in your "Location" header.

```php
<?php

header('Location: https://example.com/some/page');

http_status_code(301);

exit;

// This code will never be executed.
do_something();

 // Text output should come after headers.
 // This code won't be executed either.
echo 'Hello, World!';
```

Who or what benefits from a correct HTTP code?

- Users consuming the web API you made;
- Google's bot trying to figure out what's happening on your website. For instance, when it sees a "301 Moved Permanently" HTTP code, it knows your page has been moved to a new location and needs to be updated in its index.

There are many other use cases, I won't bother listing here, but trust me when I tell you it's important.
