---
Description: switch, case, and break. What are all these? When should you use it instead of if? What are its pros and cons?
Published At: 2022-10-07
Modified At:
---

# Learn all about the switch statement in PHP

## What is a switch statement in PHP?

**The `switch` statement is similar to a `if` statement, but it is less repetitive and less prone to errors.**

It should be used when you have to check a decent amounf of values. Let me explain.

## Why use switch instead of if in PHP?

Sometimes, you may have to compare a variable or an expression to a significant amount of possible values. Doing it with an `if` statement can be repetitive and harder to read.

In the following example, a `$language` variable has been declared, and we display a thank you depending on its value. Here's how it looks with an `if`:

```php
$language = 'Français';

if ($language === 'English') {
    echo 'Thank you!';
} elseif ($language === 'Español') {
    echo '¡Gracias!';
} elseif ($language === 'Français') {
    echo 'Merci !';
} elseif ($language === 'Italiano') {
    echo 'Grazie!';
} else {
    echo '🤷‍♂️';
}
```

Let's now see how it looks with a `switch`.

## How does the switch statement works in PHP?

Apart from the `break` statement, `switch`'s syntax is less repetitive and easier to read.

```php
$language = 'Français';

switch ($language) {
	case 'English':
		echo 'Thank you!';
		break;
	case 'Español':
		echo '¡Gracias!';
		break;
	case 'Français':
		echo 'Merci !';
		break;
	case 'Italiano':
		echo 'Grazie!';
	    break;
    default:
		echo '🤷‍♂️';
}
```

1. Each `case` is run in the order it's been declared;
2. If the condition is met (in this example, `$language` equals "Français"), we run the code following the `case` statement;
4. If the `break` statement isn't used, each case will be executed after a match. Don't forget to use it!
3. The `default` case comes last and it has to be unique to avoid a fatal error.
