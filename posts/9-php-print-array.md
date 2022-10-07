---
Description: Take a look at all the one-line of code built-in ways to print arrays in PHP.
Published At: 2022-10-07
Modified At:
---

# Print an array in PHP and see what's hidden

**There are multiple ways to print the content of an array in PHP.**

This article will review each of them built into the language.

## print_r()

print_r() displays arrays in an human-readable format.

Example:

```php
print_r(['Foo', 'Bar', 'Baz']);
```

Output:

```
Array
(
    [0] => Foo
    [1] => Bar
    [2] => Baz
)
```

If you need to capture the output, you can pass a second parameter to print_r():

```php
$output = print_r(['Foo', 'Bar', 'Baz'], true);
```

## var_dump()

var_dump() prints informations about any type of value. It works great for arrays as well!

Example:

```php
var_dump(['Foo', 'Bar', 'Baz']);
```

Output:

```
array(3) {
  [0]=>
  string(3) "Foo"
  [1]=>
  string(3) "Bar"
  [2]=>
  string(3) "Baz"
}
```

You can also print multiple variables at once:

```php
var_dump($foo, $bar, $baz, …);
```

## var_export()

var_export() prints a parsable string representation of a variable. It means you could just copy and paste it into your source code.

Example:

```php
$array = ['Foo', 'Bar', 'Baz'];

var_export($array);
```

Output:

```
array (
  0 => 'Foo',
  1 => 'Bar',
  2 => 'Baz',
)
```

## json_encode()

`json_encode()` prints can print arrays as JSON.

Example:

```php
$array = ['Foo', 'Bar', 'Baz'];

echo json_encode($array);
```

Output:

```
["Foo","Bar","Baz"]
```
