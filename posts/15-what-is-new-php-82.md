---
Description: PHP 8.2 will be released in November and you might want to be up to date will all the new features and breaking changes introduced.
Published At: 2022-10-10
Modified At:
---

# What's new in PHP 8.2? Here's everything you need to know.

## When will PHP 8.2 be released?

**PHP 8.2 will be released on November 24, 2022.**

## Deprecated partially supported callables

```
"self::method"
"parent::method"
"static::method"
["self", "method"]
["parent", "method"]
["static", "method"]
["Foo", "Bar::method"]
[new Foo, "Bar::method"]
```

## Deprecated dynamic properties

```php
class Foo {}

$foo = new Foo;
// Deprecated: Creation of dynamic property Foo::$bar is deprecated
$foo->bar = 'baz';
```

```php
#[AllowDynamicProperties]
class Foo {}

$foo = new Foo;
$foo->bar = 'baz';
```

## System locale-independent case conversion

## Redacted parameters in back traces

```php
function send_message_to(
    $recipient,
    $from,
    #[\SensitiveParameter] $subject,
    #[\SensitiveParameter] $message,
) {
    throw new Exception;
}
 
// Fatal error: Uncaught Exception in foo.php:9
// Stack trace:
// #0 foo.php: send_message_to(
//                 'Terroristes',
//                 'Montgomery Burns',
//                 Object(SensitiveParameterValue),
//                 Object(SensitiveParameterValue)
//             )
send_message_to(
    recipient: 'Terrorists',
    from: 'Montgomery Burns',
    subject: "Uranium",
    message: 'Lorem ipsum sit amet…'
);
```

## `null`, `true` and `false` as standalone types

```php
function foo() : true|false
{
    // Fatal error: Type contains both true and false,
    // bool should be used instead
    return 0;
}

foo();
```

## Deprecated utf8_encode() and utf8_decode()

## Deprecated ${} string interpolation

```php
$name = 'Bart';

echo "Hello, ${name}!";

// Deprecated: Using ${var} in strings is deprecated, use {$var} instead
```

```php
$name = 'Bart';

echo "Hello, $name!";
```

```php
$name = 'Bart';

echo <<<TEXT
Hello, $name!
TEXT;
```

## Read-only classes

```php
class Pokemon
{
	public readonly string $name;
  
	public readonly int $size;
  
    public readonly Type $firstType;
  
    public readonly ?Type $secondType = null;
}
```

```php
readonly class Pokemon
{
	public string $name;
  
	public int $size;
  
    public Type $firstType;
  
    public ?Type $secondType = null;
}
```

## Disjunctive Normal Form Types

```php
function foo((A&B)|(C&D&E)|Bar|null $baz) {
    …
}
```

## Fetch properties of enums in const expressions

```php
enum Pokemon: string {
    case bulbasaur = "Bulasaur";
    case charmander = "Charmander";
    case squirtle = "Squirtle";
}

class Kanto {
    public const POKEMON = [
        Pokemon::bulbasaur->value,
        Pokemon::charmander->value,
        Pokemon::squirtle->value,
    ];
}

// PHP 8.1: Fatal error: Constant expression contains invalid operations
// PHP 8.2: array(3) {
//   [0]=>
//   string(10) "Bulasaur"
//   [1]=>
//   string(10) "Charmander"
//   [2]=>
//   string(8) "Squirtle"
// }
var_dump(Kanto::POKEMON);
```

## Constants in Traits

```php
trait HeavyDrinker {
    public const MINIMUM = 5;
  
    public function drink() {
	    …
    }
}

class Homer {
    use HeavyDrinker;
}

class Barney {
    use HeavyDrinker;
}
```
