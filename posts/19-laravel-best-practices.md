---
Description: Following a framework's best practices will put every one of your developer team members on the same page and skyrocket your projects to new heights.
Image: https://res.cloudinary.com/benjamin-crozat/image/upload/dpr_auto,f_auto,q_auto,w_auto/v1666966937/benjamincrozat.com/laravel-best-practices_xovbnu.png
Featured: true
Published At: 2022-10-30
Modified At:
---

# Laravel best practices: the definitive guide for 2022

![Laravel best practices: the definitive guide for 2022](https://res.cloudinary.com/benjamin-crozat/image/upload/dpr_auto,f_auto,q_auto,w_auto/v1666966937/benjamincrozat.com/laravel-best-practices_xovbnu.png)

**This article is a work in progress. It can still be improved and debated and you can hit me on [Twitter](https://twitter.com/benjamincrozat) for that.**

For most Laravel projects, the best practices can be summarized as two points:
- Stick to the defaults;
- Defer as much work as possible to the framework.

Apply these two rules, and you'll make everyone's life easier.

Now, let's see how you can apply them to your Laravel applications thanks to actionable tips and tricks.

## General best practices

### Keep Laravel up to date

[Keeping Laravel up to date](https://laravel.com/docs/upgrade) provides the following benefits:
- Access to the latest and greatest time saving additions to the framework;
- Latest bug and security fixes;
- Compatibility with the latest official and community packages.

The only way to keep Laravel up to date without the fear of breaking everything is to start writing [tests](https://laravel.com/docs/testing).

### Keep packages up to date

Access to thousands of community packages is what makes our job way easier.

But the more packages you use, the more vulnerabilities you might be subject to. 

If your codebase is tested, regularly running `composer update` goes a long way toward a better codebase.

### Keep your project tested

[Writing automated tests](https://laravel.com/docs/testing) is a vast and lesser known topic among developers.

But did you know it's also the only way to ensure reliability?

What are the benefits of reliability?
- Less bugs;
- Less unhappy customers;
- More confident developers;
- Less unhappy clients or employers;
- More confident new team members who won't break what they don't know;
- Etc.

### Stick to the default directory structure and defer as much work as possible to Laravel

Do you know why you're using a framework?

1. It **frames** your **work** with a set of guidelines that you can follow to ensure every member of your team is on the same page;
2. It provides a lot of complex, boring and battle tested features for free, so you can focus on coding what is necessary for your project.

## Controllers best practices

### Use form requests

[Form requests](https://laravel.com/docs/validation#form-request-validation) exist for a few reasons:
1. Reusing (often complex) validation across multiple controllers;
2. Offloading code from bloated controllers;
3. Checking out the *app/Http/Requests* folder for everything related to validation is natural for everyone.

### Use single action controllers for clarity

Sometimes, it makes things easier to use [single action controllers](https://laravel.com/docs/controllers#single-action-controllers). You can't always avoid complexity and this complexity might be better off in its own file.

### Use policies

[Policies](https://laravel.com/docs/authorization#creating-policies) exist for a few reasons:
1. Reusing authorization logic across multiple controllers;
2. Offloading code from bloated controllers;
3. Checking out the *app/Policies* folder for everything related to authorizations is natural for everyone.

## Eloquent best practices

### Use eager loading

[Eager loading](https://laravel.com/docs/eloquent-relationships#eager-loading) is a great solution to avoid N+1 problems.

Let's say you are displaying a list of 30 posts with their author:
- Eloquent will make one query for those 30 posts;
- Then, 30 queries for each author. It doesn't matter if one author wrote more than one post.

The fix is simple: use the `with()` method and you'll go from 31 queries to only 2.

```php
Post::with('author')->get();
```

### Use Eloquent's strict mode

[Eloquent's strict mode](https://laravel.com/docs/eloquent#enabling-eloquent-strict-mode) is a blessing for debugging. It will throw exceptions when:
- Lazy loading relationships;
- Assigning non-fillable attributes;
- Accessing attributes that don't exist (or weren't retrieved).

Add this code in the `boot()` method of your *AppServiceProvider.php*:

```php
Model::shouldBeStrict(
    ! app()->isProduction() // Only outside of production.
);
```

## Performances best practices

### Use `dispatchAfterResponse()` for long running tasks

Lets use the simplest example possible: you have a contact form. Sending an email may take between one or two seconds depending on the method you use.

What if you could delay this until the user received your server's response?

That's exactly what [`dispatchAfterResponse()`](https://laravel.com/docs/queues#dispatching-after-the-response-is-sent-to-browser) does:

```php
SendContactEmail::dispatchAfterResponse($input);
```

### Use queues for even longer running tasks

Imagine you have to process images uploaded by your users. If you process every image as soon as they're submitted, this will happen:
- Your server will burn;
- Your users will have to wait in front of a loading screen.

This isn't good UX and we can change that.

Laravel has a [queue system](https://laravel.com/docs/queues) that will run all those tasks sequentially or with a limited amount of parallelism.

## Testing best practices

### Lazily refresh your database

When you can get away with fake data on your local environnement, the best thing to do is to test against a fresh database every time you run a test.

You can use the `Illuminate\Foundation\Testing\LazilyRefreshDatabase` trait in your *tests/TestCase.php*.

There's also a `RefreshDatabase` trait, but the lazy one is more efficient, as migrations for unused databases won't be ran during testing.

### Make use of factories

[Factories](https://laravel.com/docs/9.x/eloquent-factories) make testing way easier. You can create one using the `php artisan make:factory` command.

Using them, we can create all the resources we need when writing tests.

```php
public function test_it_shows_posts()
{
    $post = Post::factory()->create();

    $this
        ->get(route('posts.show', $post))
        ->assertOk();
}
```

### Test against the real stack whenever it's possible

When running your web application in production, you probably use something other than SQLite like MySQL.

So why are you running your tests using SQLite?

Use MySQL, or you won't be able to catch bugs that occur only with this database.

Are you running Redis on production? Same thing, don't use the array cache driver!

### Use database transactions

In one of my projects, I need to create a database filled with real data provided by CSV files on GitHub.

It takes time and I can't refresh my database before every test.

So when my tests alter the data, I want to rollback the changes. You can do so by using the `Illuminate\Foundation\Testing\DatabaseTransactions` trait in your *tests/TestCase.php*.
