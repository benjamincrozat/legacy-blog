[![Laravel Forge Site Deployment Status](https://img.shields.io/endpoint?url=https%3A%2F%2Fforge.laravel.com%2Fsite-badges%2F853f706f-237e-49ce-9812-7d452d57c0bb%3Fdate%3D1%26commit%3D1&style=for-the-badge)](https://forge.laravel.com)

# [benjamincrozat.com](https://benjamincrozat.com)

This is the source code of my blog, [benjamincrozat.com](https://benjamincrozat.com). This blog built with the TALL stack gets more than **20K visitors per month**.

That being said, there's nothing fancy, and it's probably not what you should do for yours because the code is far from being as perfect as I want, and we all have different needs. But if you're curious, you can check it out anyway.

## Before you proceed

If you are here to see how I'm doing with SEO, you will be disappointed. SEO is about writing content matching popular search requests. [I wrote about this](https://benjamincrozat.com/seo-case-study).

## What you will learn

This is a small project that I work on alone. That being said, you will be able to learn more about:
- Simplicity. Most developers underestimate the benefits of simple code.
- Testing. A crucial part of ensuring everything stays stable.
- How to use various frontend technologies such as Alpine.js and Tailwind CSS.

## Requirements

**This project requires Laravel Nova, which is a paid package. For now, I don't know how to make it optional, but meanwhile, you can just remove it from the dependencies.**

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

To run the tests, just execute the following command:

```bash
php artisan test
```

## Deployment

Once the tests are green in the CI environment, a webhook from Laravel Forge is called, which triggers the deployment. 

Some details about the production environment:
- I host the blog on a $6 DigitalOcean VPS.
- I could have stopped here, but I'm also using a managed MySQL database for peace of mind.
- I use Sentry to monitor errors.
