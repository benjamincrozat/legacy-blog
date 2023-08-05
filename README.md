[![Laravel Forge Site Deployment Status](https://img.shields.io/endpoint?url=https%3A%2F%2Fforge.laravel.com%2Fsite-badges%2F853f706f-237e-49ce-9812-7d452d57c0bb%3Fdate%3D1%26commit%3D1&style=for-the-badge)](https://forge.laravel.com)

<img src="https://github.com/benjamincrozat/benjamincrozat.com/assets/3613731/af6aaf53-a7f6-45fd-ab3a-114b862f4a1a" width="64" height="64" alt="The logo of the blog of Benjamin Crozat." />

# [benjamincrozat.com](https://benjamincrozat.com)

This is the source code of my blog, [benjamincrozat.com](https://benjamincrozat.com). This blog was built with the TALL stack and gets more than **20K visitors per month**.

<figure>
    <img src="https://github.com/benjamincrozat/benjamincrozat.com/assets/3613731/b48b67b1-5da2-4319-941e-e600cc182a5e" alt="My Pirsch Analytics Dashboard." />
    <figcaption>My <a href="https://benjamincrozat.com/recommends/pirsch">Pirsch Analytics</a> dashboard. Actually, in the last 30 days, I got more than 25K visits!</figcaption>
</figure>

&nbsp;

<figure>
    <img src="https://github.com/benjamincrozat/benjamincrozat.com/assets/3613731/83c2a06a-305f-485a-bd09-80fe6b8cfeaa" alt="My Google Search Console." />
    <figcaption>My Google Search Console. You can see the growth since I launched in September 2022.</figcaption>
</figure>

&nbsp;

I feel obligated to mention that my success is certainly not because of my tech stack. I just wanted to own my piece of real estate on the web. If you also want to create your blog, I don't recommend anything I did. The code is not ideal, and we all have different needs. But if you're curious, there you go, enjoy!

## Before you proceed

If you are here to see how I'm doing with SEO, you will be disappointed. SEO is about producing content matching popular search requests. [I wrote about my SEO journey](https://benjamincrozat.com/seo-case-study). As long as your website isn't complete garbage, you can rank your pages and I recommend you to not overthink it.

## What you will learn

This is a small project that I work on alone. That being said, you will be able to learn more about:
- Simplicity. Most developers underestimate the benefits of simple code.
- Creating admin pages based on Laravel Nova.
- Testing. A crucial part of ensuring everything stays stable.
- How to use various frontend technologies such as Alpine.js and Tailwind CSS.

## Requirements

**This project requires Laravel Nova, which is a paid package. For now, I don't know how to make it optional, but meanwhile, you can remove it from the dependencies.**

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
