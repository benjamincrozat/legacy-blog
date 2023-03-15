[![Laravel Forge Site Deployment Status](https://img.shields.io/endpoint?url=https%3A%2F%2Fforge.laravel.com%2Fsite-badges%2F853f706f-237e-49ce-9812-7d452d57c0bb%3Fdate%3D1%26commit%3D1&style=for-the-badge)](https://forge.laravel.com)

# [benjamincrozat.com](https://benjamincrozat.com)

Source code for [benjamincrozat.com](https://benjamincrozat.com)

## Requirements

**This project requires Laravel Nova, which is a paid package. For now, I don't know how to make it optional, but meanwhile, you can just remove it for the dependencies.**

- PHP 8.2+
- MySQL 8+

## Installation

This project should run in Laravel Valet, Docker or whatever else you prefer to use.

```bash
git clone git@github.com:benjamincrozat/benjamincrozat.com.git

cd benjamincrozat.com
```

```bash
composer install
```

```bash
mysql -u root -e "CREATE DATABASE benjamincrozat"
```

```bash
php artisan migrate --seed
```

```bash
yarn
yarn dev
```
