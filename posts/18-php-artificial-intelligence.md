---
Description: AI (Artificial Intelligence) is a trending topic in the programming space. It enables developer to do incredible things and lots of startups build products around it.
Image: https://res.cloudinary.com/benjamin-crozat/image/upload/dpr_auto,f_auto,q_auto,w_auto/v1666886355/benjamincrozat.com/robot_qxeqid.png
Published At:
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

And the best of all? They make it easy for developers to use AI in their projects. I will show you how.

## The OpenAI API

The [OpenAI API](https://openai.com/api/) can be used **for tasks involving natural language processing and generation (in over 26 different languages!), as well as code understanding and generation**.

For instance, [GitHub Copilot](https://github.com/features/copilot) (which I can't live without anymore) is built around the same API we'll learn to use!

Many other projects are created with the help of AI. You can see it for yourself on [ProductHunt](https://www.producthunt.com/search/launches?q=ai). There's no shortage of them.

I must tell you first, though: the [**OpenAI API isn't free**](https://openai.com/api/pricing/)!

But who cares? They recently lowered their prices and you can start with $18 of free credit for three months. After that, it's incredibly cheap as long as you use it for testing purposes.

I recommend you to get up to speed by playing with GPT-3 using [OpenAI's playground](https://beta.openai.com/playground).  
[Create an account](https://beta.openai.com/signup), mess in the playground and join me for the next step!

## How to use the OpenAI API PHP client

The best way to learn is to build.

When I started playing with OpenAI, I tried to make a jobs board powered by AI.

For this tutorial, we will make a basic version of this where we just extract unstructured data from a given job offer instead of having a crawler that does it for us.

### Installation

First, we will create a bare-minimum PHP project:

```bash
mkdir openai-test
cd openai-test
touch index.php
```

Next, we need to install the OpenAI client:

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
