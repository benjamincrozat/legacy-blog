---
Description: Migrations are essential in any Laravel app using a database. I will tell you what they are, why you should use them and how you can generate them.
Image: https://res.cloudinary.com/benjamin-crozat/image/upload/dpr_auto,f_auto,q_auto,w_auto/v1667572258/data_stptpp.jpg
Published At: 2022-09-12
Modified At: 2022-10-18
---

# How to make and use migrations in Laravel

![Laravel migrations feeding database servers.](https://res.cloudinary.com/benjamin-crozat/image/upload/dpr_auto,f_auto,q_auto,w_auto/v1667572258/data_stptpp.jpg)

## What are migrations in Laravel?

Migrations contain PHP code that shapes your database exactly how you want it.

## What's the advantages of using migrations in Laravel?

Using Laravel's migrations have several advantages such as:
- Being in sync with your team members;
- Never use your MySQL client ever again.
- Keeping track of the database's schema over time thanks to your Git history;
- Regenerate your the database to include any change that's been made, no matter which environment you're in;

## When to use migrations?

Migrations should be used when you need to:
- Add a table;
- Add a column;
- Update a column;
- Add an index;
- Etc.

You got it, create a migration every time you need to make a change to your database.

## How to create migrations in Laravel?

Creating a migration can be done thanks to Artisan with the command below:

```bash
php artisan make:migration CreatePostsTable
```

1. Write the migration's name in camelCase;
2. Artisan will convert it to snake_case (making the file's name  more readable);
3. A timestamp will be added as a prefix.

Here's an example:

```
INFO Created migration [2022_09_12_142156_create_posts_table]. 
```

A migration looks like this:

```php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up() : void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            // These are the columns you want to add to your table.
            $table->string('title');
            $table->text('content');

            // These are the "created_at" and "updated_at" columns.
            $table->timestamps();
        });
    }

        public function down() : void
        {
            Schema::dropIfExists('posts');
        }
};
```

But there's more. Did you know you can pass multiple parameters?

```
php artisan make:migration
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

What I love with Artisan is the possibility to create a model with its migration effortlessly. For that, we need to use another command, though.

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

## How to migrate the database?

To migrate your database, use the `php artisan migrate` command. 

```
INFO  Running migrations.  

2014_10_12_000000_create_users_table ................................................................................................ 4ms DONE
2014_10_12_100000_create_password_resets_table ...................................................................................... 1ms DONE
2018_01_01_000000_create_action_events_table ........................................................................................ 7ms DONE
2019_05_10_000000_add_fields_to_action_events_table ................................................................................. 1ms DONE
2019_08_19_000000_create_failed_jobs_table .......................................................................................... 1ms DONE
```

### Rollback migrations

Rollback any change using the `php artisan migrate:rollback` command. As you can se below, migrations are rollbacked in the inverse order.

So make sure to correctly use the `down()` method.

```
INFO  Rolling back migrations.  

2019_08_19_000000_create_failed_jobs_table .......................................................................................... 1ms DONE
2019_05_10_000000_add_fields_to_action_events_table ................................................................................. 8ms DONE
2018_01_01_000000_create_action_events_table ........................................................................................ 1ms DONE
2014_10_12_100000_create_password_resets_table ...................................................................................... 1ms DONE
2014_10_12_000000_create_users_table ................................................................................................ 1ms DONE
```

### Wipe out your database and migrate

The `php artisan migrate:fresh` command will wipe out your database before migrating.

```
Dropping all tables ................................................................................................................. 7ms DONE

INFO  Preparing database.  

Creating migration table ............................................................................................................ 3ms DONE

INFO  Running migrations.  

2014_10_12_000000_create_users_table ................................................................................................ 2ms DONE
2014_10_12_100000_create_password_resets_table ...................................................................................... 1ms DONE
2018_01_01_000000_create_action_events_table ........................................................................................ 6ms DONE
2019_05_10_000000_add_fields_to_action_events_table ................................................................................. 1ms DONE
2019_08_19_000000_create_failed_jobs_table .......................................................................................... 1ms DONE
2021_08_25_193039_create_nova_notifications_table ................................................................................... 2ms DONE
2022_04_26_000000_add_fields_to_nova_notifications_table ............................................................................ 1ms done
```

This command won't work in production to prevent disasters. 😬

