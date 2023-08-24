<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Merchant;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run() : void
    {
        Category::factory()->hasPosts(10, ['is_published' => true])->createQuietly([
            'name' => 'Alpine.js',
            'description' => 'Alpine.js is a lightweight JavaScript framework for pragmatic developers building reactive web interfaces.',
            'primary_color' => 'cyan-600',
        ]);

        Category::factory()->hasPosts(10, ['is_published' => true])->createQuietly([
            'name' => 'CSS',
            'description' => 'CSS, or Cascading Style Sheets, is a language used to define and apply styles (like fonts, colors, and spacing) to your favorite web pages.',
            'primary_color' => 'blue-600',
        ]);

        Category::factory()->hasPosts(10, ['is_published' => true])->createQuietly([
            'name' => 'GPT',
            'description' => 'GPT, or Generative Pre-trained Transformers, is a revolutionary LLM (Large Language Model) that changed world of artificial intelligence forever.',
            'primary_color' => 'emerald-500',
        ]);

        Category::factory()->hasPosts(10, ['is_published' => true])->createQuietly([
            'name' => 'HTML',
            'description' => 'HTML, or HyperText Markup Language, is the standard markup language used to create and structure content for the web, which is then displayed by browsers.',
            'content' => <<<'MARKDOWN'
## What is HTML?

Imagine a Lego house. Each Lego brick represents a piece of content on a webpage: a paragraph, a headline, an image, etc. HTML is like the guide or instruction manual that shows you how to assemble these bricks into a structured house. It's the foundation of any website.

## HTML's basic definition

HTML stands for "HyperText Markup Language." At its heart, it's a way to describe the structure of a webpage using different "tags." These tags tell the browser, like [Safari](https://www.apple.com/safari/), [Chrome](https://www.google.com/chrome/) or [Firefox](https://www.mozilla.org/firefox/new/), how to display the content.

## Why do we use HTML?

Let's go back to our Lego analogy. Without the guide or instruction manual (HTML), you'd just have a bunch of random Lego pieces. They might be colorful and interesting, but they wouldn't come together to form a recognizable house. HTML helps you to:

- **Organize content**: HTML helps in arranging content in a logical manner. Headlines, paragraphs, lists, links, and more are placed where they make sense.
- **Display media**: HTML can embed images, videos, and other multimedia elements into a page.
- **Create links**: One of the unique things about the web is the ability to jump from one page to another with a click. HTML makes this possible through hyperlinks.

## What HTML is made of

A webpage built with HTML consists of various "elements", each defined by "tags". Here's a simple breakdown:

- **Tags**: These are the building instructions. For instance, to start a paragraph, you'd use the `<p>` tag, and to end it, you'd use the `</p>` tag.
- **Attributes**: Think of these as additional instructions or modifiers for your Lego pieces. For instance, if you wanted a particular brick (or piece of content) to be a certain color or style, you'd use an attribute.
- **Content**: This is the actual text, image, or whatever you're displaying. Using our analogy, this is the design or picture on each Lego brick.

## HTML in comparison

Continuing with our house analogy from before:

- **HTML is like the blueprint of a house.** It defines where everything goes: the walls, doors, windows, and roof.
- **[CSS](/categories/css) is like the decor and paint.** It specifies the colors, styles, and overall look of the house.
- **[JavaScript](/categories/javascript) is the tech gadgets and electricity.** It adds functionality like turning on TVs, adjusting thermostats, and more.
- **[PHP](/categories/php) (or other backend languages such as Python and Ruby) is the plumbing and hidden mechanisms that make certain features possible**, like having running water on demand.
MARKDOWN,
            'primary_color' => 'orange-400',
        ]);

        Category::factory()->hasPosts(10, ['is_published' => true])->createQuietly([
            'name' => 'Inertia.js',
            'description' => 'Create modern single-page React, Svelta, and Vue apps using classic server-side routing. Inertia.js works with any backend, and is tuned for Laravel.',
            'primary_color' => 'purple-400',
        ]);

        Category::factory()->hasPosts(10, ['is_published' => true])->createQuietly([
            'name' => 'JavaScript',
            'description' => 'JavaScript is a versatile, high-level programming language that makes the web less boring by adding dynamic behavior.',
            'primary_color' => 'yellow-400',
            'secondary_color' => 'black',
        ]);

        Category::factory()->hasPosts(10, ['is_published' => true])->createQuietly([
            'name' => 'Laravel',
            'description' => 'Laravel is a world-class web application framework with an expressive and elegant syntax used by the biggest companies in the world.',
            'primary_color' => 'red-400',
        ]);

        Category::factory()->hasPosts(10, ['is_published' => true])->createQuietly([
            'name' => 'Livewire',
            'description' => 'Livewire is what enable Laravel developers to build interactive web applications without the hassle of dealing with complex JavaScript workflows.',
            'primary_color' => 'pink-400',
        ]);

        Category::factory()->hasPosts(10, ['is_published' => true])->createQuietly([
            'name' => 'MySQL',
            'description' => 'MySQL is a popular database system used to store, organize, and retrieve data for websites and apps.',
            'primary_color' => '[#3d6e93]',
        ]);

        Category::factory()->hasPosts(10, ['is_published' => true])->createQuietly([
            'name' => 'PHP',
            'description' => 'PHP, or Hypertext Preprocessor, is a server-side scripting language designed for web development, enabling you to create web application that can change while you are sleeping.',
            'content' => <<<'MARKDOWN'
## What is PHP?

Imagine a talented chef in the kitchen of a restaurant. Customers come in, look at the menu, and place their order.

The chef, depending on the order, picks the right ingredients, cooks them, and serves the dish exactly the way the customer likes it. PHP is like that chef. It prepares and delivers web pages based on what users ask for.

## PHP's basic definition

PHP stands for "Hypertext Preprocessor". At its core, it's a programming language used to create dynamic web pages. Dynamic means that the content can change depending on different factors, like who's visiting or what time it is.

## Why do we use PHP?

Imagine going to a restaurant where every dish is pre-cooked and left on a table. You have to choose from what's available, even if it's not fresh or exactly what you want. Without something like PHP, websites would be a lot like this restaurant - serving the same static content to everyone.

With PHP (our talented chef), websites can:
- **Interact with databases**: It can pull information, like articles or user data, from a storage area called a database. This is like our chef fetching fresh ingredients from the fridge.
- **Personalize content**: Depending on who's visiting, PHP can change the content of a web page. If you have a profile on a website, PHP helps show your profile data, not someone else's.
- **Process forms**: When you fill out a form on a website, PHP can handle that information, kind of like when you give special cooking instructions to a chef.

## Where is PHP used?

PHP is behind the scenes of many websites. Some of the biggest online platforms, like Facebook and Wikipedia, started with PHP.

When you visit a website powered by PHP, you don't see the PHP code itself. Just like in our restaurant, you don't see the chef cooking; you only see (and taste) the final dish.

## PHP in comparison

Think of building a website as constructing a house.

- **[HTML](/categories/html) is like the bricks and mortar**; it gives structure to the house.
- **[CSS](/categories/css) is the paint, wallpaper, and decorations**; it makes the house look good.
- **[JavaScript](/categories/javascript) is like the electricity and gadgets**; it adds interactive features to the house, like lights that turn on or off.
- And then there's PHP. **PHP is like the plumbing.** You don't always see it, but it's essential for delivering fresh water on demand and taking away waste. It works in the background to ensure the house is functional and can adapt to the needs of its inhabitants.

So, in summary, PHP is a behind-the-scenes hero of the web, working like a skilled chef or the hidden plumbing in a house, making sure users get fresh, personalized content on demand.
MARKDOWN,
            'primary_color' => '[#4f5b93]',
        ]);

        Category::factory()->hasPosts(10, ['is_published' => true])->createQuietly([
            'name' => 'SEO',
            'description' => 'Coding is great, but having real users is even better. Learn how to build sustainable long-term traffic with Search Engine Optimization (SEO).',
        ]);

        Category::factory()->hasPosts(10, ['is_published' => true])->createQuietly([
            'name' => 'Tailwind CSS',
            'description' => 'Tailwind CSS is a utility-first framework that will make you fall in love with UI design again, and teach you to always question the status quo.',
            'primary_color' => 'cyan-400',
        ]);

        Category::factory()->hasPosts(10, ['is_published' => true])->createQuietly([
            'name' => 'Vue.js',
            'description' => 'Vue.js is an approachable, performant and versatile framework for building web user interfaces.',
            'primary_color' => 'emerald-400',
        ]);

        Merchant::factory(10)->createQuietly();
    }
}
