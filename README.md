[![Laravel Forge Site Deployment Status](https://img.shields.io/endpoint?url=https%3A%2F%2Fforge.laravel.com%2Fsite-badges%2F853f706f-237e-49ce-9812-7d452d57c0bb%3Fdate%3D1%26commit%3D1&style=for-the-badge)](https://forge.laravel.com)

# [benjamincrozat.com](https://benjamincrozat.com)

This is the source code of my blog, [benjamincrozat.com](https://benjamincrozat.com). This blog built with the TALL stack gets more than **20K visitors per month**.

That being said, there's nothing fancy, and it's probably not what you should do for yours. But if you're curious, you can check it out.

## Diclaimer

If you are here to see how I'm doing with SEO, you will be disappointed. SEO is about writing content matching popular search requests. [I wrote about this](https://benjamincrozat.com/seo-case-study).

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
