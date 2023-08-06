[![Laravel Forge Site Deployment Status](https://img.shields.io/endpoint?url=https%3A%2F%2Fforge.laravel.com%2Fsite-badges%2F853f706f-237e-49ce-9812-7d452d57c0bb%3Fdate%3D1%26commit%3D1&style=for-the-badge)](https://forge.laravel.com)

<img src="https://github.com/benjamincrozat/benjamincrozat.com/assets/3613731/af6aaf53-a7f6-45fd-ab3a-114b862f4a1a" width="64" height="64" alt="The logo of the blog of Benjamin Crozat." />

# [benjamincrozat.com](https://benjamincrozat.com)

This is the source code of my blog, [benjamincrozat.com](https://benjamincrozat.com). This blog was built with the TALL stack and gets more than **20K visitors per month**.

<figure>
    <img src="https://github.com/benjamincrozat/benjamincrozat.com/assets/3613731/b48b67b1-5da2-4319-941e-e600cc182a5e" alt="My Pirsch Analytics Dashboard." />
    <figcaption>My <a href="https://benjamincrozat.com/recommends/pirsch">Pirsch Analytics</a> dashboard that is <a href="https://benjamincrozat.pirsch.io/?domain=benjamincrozat.com&interval=30d&scale=day">publicly accessible</a>.</figcaption>
</figure>

&nbsp;

<figure>
    <img src="https://github.com/benjamincrozat/benjamincrozat.com/assets/3613731/83c2a06a-305f-485a-bd09-80fe6b8cfeaa" alt="My Google Search Console." />
    <figcaption>My Google Search Console. You can see the growth since I launched in September 2022.</figcaption>
</figure>

&nbsp;

I feel obligated to mention that my relative success is not correlated to my tech stack. I just want to own my piece of real estate online and do whatever I want with it. If you also want to create your blog, I don't recommend to copy and paste anything I did. While the code works for my specific needs, it might not be the ideal solution for everyone. But if you're curious, there you go, enjoy!

## Before you proceed

You will be disappointed if you are here to see how I'm doing with SEO. SEO is about producing content matching popular search requests. [I wrote about my SEO journey](https://benjamincrozat.com/seo-case-study). You can rank your pages as long as your website isn't complete garbage. I recommend you not overthink it.

## What you will learn

This is a small project that I work on alone. That being said, you will be able to learn more about:
- Simplicity. Most developers underestimate the benefits of simple code.
- Integrating AI to speed up your writing.
- Creating admin pages based on Laravel Nova.
- Testing. A crucial part of ensuring everything stays stable.
- How to use various frontend technologies such as Alpine.js and Tailwind CSS.
- But you will also learn you should avoid. This codebase is far from what I consider perfect.

## Requirements

**This project requires Laravel Nova, which is a paid package. For now, I don't know how to make it optional, but meanwhile, you can switch to the *feature/filament* branch.**

- PHP 8.2+
- MySQL 8+

## Installation

I assume you are using Laravel Valet. But you can run it in whichever environment you want.

Clone the repository and cd into it:

```bash
git clone git@github.com:benjamincrozat/benjamincrozat.com.git

cd benjamincrozat.com
```

Create a `.env` file and generate the app key:

```bash
cp .env.example .env

php artisan key:generate
```

Install the dependencies (if you don't have a Laravel Nova license, switch to the *feature/filament* branch):

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

Install the frontend dependencies and build the assets:

```bash
yarn && yarn build
```

## Testing

To run the tests, execute the following command:

```bash
php artisan test
```

## Deployment

Once the tests are green in the CI environment, a webhook from Laravel Forge is called, which triggers the deployment. 

Some details about the production environment:
- I host the blog on a [$6 DigitalOcean VPS](https://benjamincrozat.com/recommends/digitalocean).
- I could have stopped here, but I'm also using [a managed MySQL database](https://benjamincrozat.com/recommends/digitalocean-managed-mysql-database) for frequent automatic backups and not having to deal with anything related to the configuration.
- I use Sentry to monitor errors.
