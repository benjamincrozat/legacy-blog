---
Description: Migrations are essential in any Laravel app using a database. I will tell you what they are, why you should use them and how you can generate them.
Published At: 2022-09-12
Modified At: 2022-09-15
---

# Make your life easier, use Laravel's migrations at all cost

## Why should you use migrations

Instead of changing the database manually, you should use Laravel's migrations. Migrations contain PHP code that shapes your database exactly how you want it.  
It means that each time you make a change, it's added to your Git history. Everyone in your team, including you, will be able to keep track of the database's schema and regenerate their development database accordingly.

## When you should use migrations

In case the previous point wasn't clear enough, here's when you should use migrations:
- Add a table;
- Add a column;
- Update a column;
- Add an index;
- Etc.

You got it, create a migration for **EVERYTHING**.

## How to create a migration

Creating a database can be done with Artisan with the command below:

```bash
php artisan make:migration CreatePostsTable
```

1. Write the migration's name in camelCase;
2. Artisan will convert it to snake_case (the file's name will be more readable);
3. The date you created it will be added as a prefix.

Here's an example:

```
INFO Created migration [2022_09_12_142156_create_posts_table]. 
```

But there's more. Did you know you can pass multiple parameters?

```
Options:
 --create[=CREATE] The table to be created
 --table[=TABLE] The table to migrate
 --path[=PATH] The location where the migration file should be created
 --realpath Indicate any provided migration file paths are pre-resolved absolute paths
 --fullpath Output the full path of the migration
```

Let's see how to use them and why.

### Create a migration with the `--create` option

The `--create` option tells Artisan to use something else than the table name it infered from the migration's name. It could be useful if you need to use another language from tables' names for instance.

```bash
php artisan make:migration CreatePostsTable --create=billets
```

### Create a migration with the `--table` option

The `--table` option tells Artisan we don't need to create a new table, but rather update an existing one. If you don't follow Laravel's conventions for naming your migrations, this is the option you need.

```bash
php artisan make:migration Whatever --table=posts
```

### Create a migration with its model

What I love with Artisan is to be able to create a model with its migration effortlessly. For that, we need to use another command, though.

```bash
php artisan make:model Post --migration
```

You can even use the shorthand option for the migration:

```bash
php artisan make:model Post -m 
```

And if you look at the help, you will appreciate what Artisan can do for you even more.

```bash
php artisan make:model -h
```

```
Description:
 Create a new Eloquent model class

Usage:
 make:model [options] [--] <name>

Arguments:
 name The name of the class

Options:
 -a, --all Generate a migration, seeder, factory, policy, resource controller, and form request classes for the model
 -c, --controller Create a new controller for the model
 -f, --factory Create a new factory for the model
 --force Create the class even if the model already exists
 -m, --migration Create a new migration file for the model
 --morph-pivot Indicates if the generated model should be a custom polymorphic intermediate table model
 --policy Create a new policy for the model
 -s, --seed Create a new seeder for the model
 -p, --pivot Indicates if the generated model should be a custom intermediate table model
 -r, --resource Indicates if the generated controller should be a resource controller
 --api Indicates if the generated controller should be an API resource controller
 -R, --requests Create new form request classes and use them in the resource controller
 --test Generate an accompanying PHPUnit test for the Model
 --pest Generate an accompanying Pest test for the Model
```

## Where to go from there?

My goal was to convince you that using migrations is mandatory. Now, you can learn how to use them in details in [the official Laravel documentation](https://laravel.com/docs/migrations).
