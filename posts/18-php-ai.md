---
Description: AI (Artificial Intelligence) is a trending topic in the programming space. It enables developers to do incredible things, and many startups build products around it.
Image: https://res.cloudinary.com/benjamin-crozat/image/upload/dpr_auto,f_auto,q_auto,w_auto/v1666886355/benjamincrozat.com/robot_qxeqid.png
Featured: true
Published At: 2022-10-27
Modified At:
---

# How to build your next PHP project with a touch of AI

![Illustration of a robot.](https://res.cloudinary.com/benjamin-crozat/image/upload/dpr_auto,f_auto,q_auto,w_auto/v1666886355/benjamincrozat.com/robot_qxeqid.png)

## What is AI (Artificial Intelligence)?

**Artificial intelligence (or AI for short) involves using computers to do things that would generally need human intelligence to get done.**

This means creating algorithms (or sets of rules) to sort, study, and draw predictions from data.

Just like a tiny human child growing up into a smarter adult, AI systems "learn" by increasing their experience and processing more information.

## What is OpenAI?

**[OpenAI](https://openai.com) is a research company that is focused on AI and machine learning.**

The company was founded by several people, including Jack Hughes (one of the co-founders of Akamai Technologies) and Elon Musk (the founder of Tesla, SpaceX, and several other startups).

OpenAI's goal is to "advance digital intelligence in the way that is most likely to benefit humanity as a whole."

And the best of all? They make it easy for us to use their [GPT-3](https://fr.wikipedia.org/wiki/GPT-3) models in our projects. I will show you how.

## The OpenAI API

The [OpenAI API](https://openai.com/api/) can be used to work with their GPT-3 models **for tasks involving natural language processing and generation (in over 26 different languages!), as well as code understanding and generation**. Each model have their specificity and cost.

For instance, [GitHub Copilot](https://github.com/features/copilot) (which I can't live without anymore) is built around the same API we'll learn to use!

Many other projects are created with the help of AI. You can see it for yourself on [ProductHunt](https://www.producthunt.com/search/launches?q=ai). There's no shortage of them.

I must tell you first, though: the [**OpenAI API isn't free**](https://openai.com/api/pricing/)!

But who cares? They recently lowered their prices, and you can start with $18 of free credit for three months. After that, it's incredibly cheap as long as you use it for testing purposes.

I recommend you to get up to speed by playing with GPT-3 using [OpenAI's playground](https://beta.openai.com/playground). 
[Create an account](https://beta.openai.com/signup), mess in the playground, and join me for the next step!

## How to use the OpenAI API PHP client

The best way to learn is to build.

When I started playing with OpenAI, I tried to make an automated job offers aggregator powered by AI.

For this tutorial, we'll make a basic version of it where we extract unstructured data from a given job offer.

### Installation

First, create a bare-minimum PHP project:

```bash
mkdir openai-test
cd openai-test
touch index.php
```

Next, install the [OpenAI client](https://github.com/openai-php/client):

```bash
composer require openai-php/client
```

Then, open the project in your favorite code editor and copy and paste this snippet:

```php
<?php

require 'vendor/autoload.php';

$client = OpenAI::client('YOUR_API_KEY');
```

[**You can generate your own API key here.**](https://beta.openai.com/account/api-keys).

### Usage

1. We need to copy and paste text from a job offer. It doesn't matter which one. (In the initial project, the crawler did it for me.)
2. We give instructions to the GPT-3 model: *"Extract the requirements for this job offer as a list."*;
3. Then, we call the API using PHP, which is way more convenient than manually making HTTP requests.

```php
$prompt = <<<TEXT
Extract the requirements for this job offer as a list.

"We are seeking a PHP web developer to join our team. The ideal candidate will have experience with PHP, MySQL, HTML, CSS, and JavaScript. They will be responsible for developing and managing web applications and working with a team of developers to create high-quality and innovative software. The salary for this position is negotiable and will be based on experience."
TEXT;

$result = $client->completions()->create([
 'model' => 'text-davinci-002', // The most expensive one, but the best.
 'prompt' => $prompt,
]);

echo $result['choices'][0]['text'];
```

Run this code, and it will output:

```
- PHP
- MySQL
- HTML
- CSS
- JavaScript
```

But you can ask all kind of questions as well. Here's another example:

```php
$prompt = <<<TEXT
Extract the salary from this job offer.

"We are seeking a PHP web developer to join our team. The ideal candidate will have experience with PHP, MySQL, HTML, CSS, and JavaScript. They will be responsible for developing and managing web applications and working with a team of developers to create high-quality and innovative software. The salary for this position is negotiable and will be based on experience."
TEXT;

$result = $client->completions()->create([
 'model' => 'text-davinci-002',
 'prompt' => $prompt,
 'max_tokens' => 50, // A token is a basically a word.
]);
```

The AI will give you this:

```
The salary for this position is negotiable and will be based on experience.
```

Now, imagine what you could do. Store this in a database, aggregate the job offers on a website and help thousands of developers!

You could have an entirely automated project. And lazy people like me know these are the best kind of projects!

GPT-3 is the basis for a variety of great products such as [Jasper](https://www.jasper.ai), [Tweet Hunter](https://tweethunter.io), and many more.

Your imagination is the limit. I hope you will create something unique thanks to the power of AI!

Learn more about the [OpenAI API](https://beta.openai.com/docs/introduction) and the [OpenAI PHP client on GitHub](https://github.com/openai-php/client).
