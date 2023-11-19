**This repository is for version 2 of my blog. The version 3 is hosted on a private repository. However, the content of my blog is now open source and everyone can contribute: [benjamincrozat/content](https://github.com/benjamincrozat/content)**

[![Laravel Forge Site Deployment Status](https://img.shields.io/endpoint?url=https%3A%2F%2Fforge.laravel.com%2Fsite-badges%2Fd43de459-aca8-4a36-9b50-8952279f1f68%3Fdate%3D1%26commit%3D1&style=for-the-badge)](https://forge.laravel.com/servers/651685/sites/2125048)

<img src="https://github.com/benjamincrozat/benjamincrozat.com/assets/3613731/d80fbb79-7de6-4b2d-ab62-602890c6aa82" width="64" height="64" alt="The logo of the blog of Benjamin Crozat." />

# [benjamincrozat.com](https://benjamincrozat.com)

This is the source code of my blog, [benjamincrozat.com](https://benjamincrozat.com). This blog was built with the TALL stack and gets more than **50,000 visitors per month**.

<figure>
    <img src="https://github.com/benjamincrozat/benjamincrozat.com/assets/3613731/470cc829-c23f-4cdd-b769-68c2726fa738" alt="My Pirsch Analytics Dashboard." />
    <figcaption>My <a href="https://benjamincrozat.com/recommends/pirsch">Pirsch Analytics</a> dashboard that is <a href="https://benjamincrozat.pirsch.io/?domain=benjamincrozat.com&interval=30d&scale=day">publicly accessible</a>.</figcaption>
</figure>

&nbsp;

<figure>
    <img src="https://github.com/benjamincrozat/benjamincrozat.com/assets/3613731/da83c642-08ec-4f9d-a027-17bca2db7e42" alt="My Google Search Console." />
    <figcaption>My Google Search Console. You can see the growth since I launched in September 2022.</figcaption>
</figure>

&nbsp;

I feel obligated to mention that my relative success is not correlated to my tech stack. I just want to own my piece of real estate online and do whatever I want with it. If you also want to create your blog, I don't recommend to copy and paste anything I did. While the code works for my specific needs, it might not be the ideal solution for everyone. But if you're curious, there you go, enjoy!

## Before you proceed

- **I don't need pull requests.** This is a project I'm working on alone, and I only have time for the bad code I write myself. 😅
- **This isn't an opportunity for mentoring.** Please try to resolve your issues on your own. If you tried your hardest, then you can [open a new discussion](https://github.com/benjamincrozat/benjamincrozat.com/discussions/new/choose)! Also, feedback is welcome (but useful feedback, not something like "whAt aBoUt SrP DudE?"
- **The code from this codebase won't help you rank on Google.** Getting organic traffic requires **hard work**, to **write content people search for** (aka smart work), and **lots and lots of patience**. [I actually wrote about my journey on the blog.](https://benjamincrozat.com/seo-case-study)

## What you will learn

This is a small project. It certainly won't teach you how to maintain apps at huge scales. That being said, you can learn about:
1. **Simplicity.** Most developers underestimate its benefits. I love figuring out how to do more with less.
2. **Using the GPT API** from OpenAI to create features that were unthinkable not so long ago.
3. **Creating admin pages using Filament.**
4. **Testing.** This is a crucial part in ensuring everything don't break and Google does not penalize me. Because I can be forgetful, distracted and overconfident sometimes. These are flaws of human beings that can easily be mitigated by machines. By the way, I don't aim for 100% code coverage, I don't think this metric reflects the stability of the codebase.
5. **How to use various frontend technologies** such as Livewire v3, Volt, Alpine.js, and Tailwind CSS.

## Notes

- **I don't care about code coverage and static analysis**, so you won't find that here.
- **This is pure and plain Laravel.** If you know the framework, you can find your way around the codebase.
- **The tests are organized just like the source code.** Most of the time, it makes it easier to know what is tested and what is not.
- **My commit history is garbage.** I'm sorry and I know it's wrong. But when you are working alone on a project, it's hard to maintain discipline for such things.

## Requirements

- PHP 8.2+
- MySQL 8+

## Installation

The instructions below have been written assuming that you are using Laravel Valet. But you can run the project in whichever environment you want (Herd, Docker with Laravel Sail, Laragon, etc.).

Clone the repository and `cd` into it:

```bash
git clone git@github.com:benjamincrozat/benjamincrozat.com.git

cd benjamincrozat.com
```

Create a `.env` file and generate the app key:

```bash
cp .env.example .env

php artisan key:generate
```

Install the dependencies:

```bash
composer install
```

Create the database:

```bash
mysql -u root -e "CREATE DATABASE benjamincrozat"
```

Migrate the database with some fake data:

```bash
php artisan migrate --seed
```

Install the frontend dependencies and build the assets using [Bun](https://bun.sh) (use NPM or Yarn if you prefer):

```bash
bun install && bun run build
```

## Testing

To run the tests, execute the following command:

```bash
php artisan test
```

## Deployment

Once the tests are green in the CI environment, a webhook from Laravel Forge is called, which triggers the deployment. 

Some details about the production environment:
- I host the blog on a [$6 DigitalOcean VPS](https://benjamincrozat.com/recommends/digitalocean) that's managed by [Ploi](https://benjamincrozat.com/recommends/ploi).
- I use Sentry to monitor errors in the production environment only.
