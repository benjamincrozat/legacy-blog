---
Description:
Published At:
Modified At:
---

# PHP apps on Mac should be ran via Laravel Valet, not Docker

Be ready, this is a very opinionated blog post. If you're a new developer still looking for guidance, follow these instructions and you'll learn a lot about the fundamental tools you use on a daily basis.

## Why Laravel Valet instead of Docker

I like:
- Simplicity;
- Pragmatism;

I dislike:
- Useless complexity;
- My computer's resources being overused;
- Waiting.

[Laravel Valet](https://laravel.com/docs/valet) is what I was looking for but didn't know was possible until Taylor Otwell and Matt Stauffer released it. It emphasizes what I like and throws away what I dislike. Here's what I hated when I was forced to use Docker:
- Waiting for containers to download, especially on slow networks;
- Bringing them up and down multiple times a day as I was switching between projects;
- Re-building as I added new PHP extensions or tweaked some settings;
- And many other complicated and annoying things I don't want to hear about anymore.

And what for? Freakin' **PHP, MySQL, and Redis dependent web applications**! In my opinion, a web developer should not be afraid to set up this kind of environment.

Once Laravel Valet is up and running on your machine:
- You won't have to worry about it for a long time;
- You can run as many projects as you want, using whatever framework or CMS you prefer, without ever leaving your web browser. Just type its local address;
- You can even use different PHP versions depending the project.

Interested? Then, follow me.

## Install the Homebrew package manager

Installing [Homebrew](https://brew.sh) is a straightforward process. The only thing you need is this command:

```bash
/bin/bash -c "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/HEAD/install.sh)"
```

If you don't have the [Xcode](https://developer.apple.com/xcode/) Command Line Tools though, it will take a few more minutes to install.

## Install the dependencies you need

### PHP (latest version)

Are you familiar with APT on Debian systems? Homebrew is as simple to start with. A package is called a "bottle". To install the latest PHP version, use the command below: 

```bash
brew install php
```

### PHP (older versions)

You might assign a different PHP version to a project (instructions below). But first, you need to install the desired PHP version:

```bash
brew install php@8.0
```

### PHP extensions

The default bottles of all PHP versions come with an extensive set of extensions. But you can easily install more of them like so: 

```bash
pecl install redis
```

Once you installed Valet, you'll be able to install extensions to other PHP versions you might have:

```bash
valet use php@8.0
pecl install redis
```

### Composer

To install Composer, you don't need to refer to [the official installation instructions](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-macos). Just install the Composer bottle and it will be available globally.

```bash
brew install composer
```

### MySQL

MySQL is a common choice among PHP developers.

```bash
brew install mysql
```

Then, you will need to start the service.

```bash
brew services start mysql
```

The default credentials are *root* and *password*. This is all you need for local development. (Unless you're paranoid, but this isn't the right blog for security.)

### Node.js

Node.js is essential for processing and compiling front-end assets. Installing Node.js will also install NPM, so don't worry.

```bash
brew install node
```

If you need multiple versions of Node, you can install [NVM](https://github.com/nvm-sh/nvm) and let it manage them for you.

```bash
brew install nvm
```

### Redis

Redis is a fast caching solution used by a the most popular websites. Laravel supports it for caching and its queue system.

```bash
brew install redis
```

## Install Valet and Laravel's official installer

Valet and the installer are Composer packages meant for a global installation. 

```bash
composer global require laravel/valet laravel/installer
```

```bash
~/.composer/vendor/bin/valet install
```

## Add Composer packages' binaries to your PATH

```bash
echo "export PATH=$PATH:$HOME/.composer/vendor/bin" >> ~/.bash_profile
```

```bash
source ~/.bash_profile
```

## Configure Valet and open your project in your web browser

```bash
valet install
```

```bash
mkdir ~/Sites
```

```bash
cd ~/Sites
```

```bash
valet park
```

## Let Valet run without priviledges

```bash
valet trust
```

## Access your projects with HTTPS

```bash
valet secure hello-world
```

```bash
valet unsecure hello-world
```

## Switch your version of PHP for all your projects

```bash
valet use php@8.0
```

```bash
valet use php
```

## Switch your version of PHP for a particular project

```bash
valet isolate --site hello-world php@8.0
```

```bash
valet unisolate --site hello-world
```
