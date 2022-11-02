---
Description: Learn why the "Using $this when not in object context" error happens, and let me show you the only way to fix.
Image: https://res.cloudinary.com/benjamin-crozat/image/upload/dpr_auto,f_auto,q_auto,w_auto/v1665150096/benjamincrozat.com/37d84224be98def713fda53db19b3c73b2787949_xzdh4n.png
Published At: 2022-10-07
Modified At:
---

# Why "Using $this when not in object context" isn't allowed

![Illustration for "Using $this when not in object context".](https://res.cloudinary.com/benjamin-crozat/image/upload/dpr_auto,f_auto,q_auto,w_auto/v1665150096/benjamincrozat.com/37d84224be98def713fda53db19b3c73b2787949_xzdh4n.png)

**The *"Using $this when not in object context"* error occurs because you are calling a non-static method from a [static method](https://www.php.net/manual/en/language.oop5.static.php#language.oop5.static.methods).**

To fix it, make your static method non-static and call it from an object.

## How to fix "Using $this when not in object context", step by step

Take this code and try to run it to see *"Using $this when not in object context"* for yourself.

```php
class Foo {
    public static function bar() {
        $this->baz();
    }
    
    public function baz() {
    }
}

Foo::bar();
```

As you can see, we are trying to call `baz()`, which is a non-static method, from a static method.

As mentionned above, we need to:
1. Remove the `static` keyword from `bar()`'s declaration;
2. Create an instance of `Foo` and call `bar()` from there.

```php
class Foo {
    public static function bar() { // [tl!--]
    public function bar() { // [tl!++]
        $this->baz();
    }
    
    public function baz() {
    }
}

Foo::bar(); // [tl!--]
$foo = new Foo; // [tl!++]
$foo->bar(); // [tl!++]
```
