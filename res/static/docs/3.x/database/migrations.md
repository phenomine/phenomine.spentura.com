---
title: Migrations
description: Migrations are like version control for your database, allowing your team to define and share the application's database schema definition. In this document, you'll learn how to use the migration library to manage your database schema.
keyword: phenomine migration, phenomine migration library, phenomine migration handling, phenomine migration management
---

# Migrations

Migrations are like version control for your database, allowing your team to define and share the application's database schema definition. If you have ever had to tell a teammate to manually add a column to their local database schema after pulling in your changes from source control, you've faced the problem that database migrations solve.

<Callout type="info">
    The migration files from version 2.x are not compatible with version 3.x. You need to create a new migration files for version 3.x.
</Callout>

## Generating Migration
You may use the `make:migration` command to generate a database migration. The new migration will be placed in your `db/migrations` directory. Each migration filename contains a timestamp that allows Phenomine to determine the order of the migrations:

```sh copy
php phenomine make:migration create_products_table
```

Phenomine will use the name of the migration to attempt to guess the name of the table and whether or not the migration will be creating a new table. If Phenomine is able to determine the table name from the migration name, Phenomine will pre-fill the generated migration file with the specified table. Otherwise, you may simply specify the table in the migration file manually.

## Migration Structure
A migration class contains two methods: up and down. The up method is used to add new columns to your database, while the down method should reverse the operations performed by the up method.

Within both of these methods, you may use the Phenomine schema builder to expressively create and modify tables. To learn about all of the methods available on the Schema builder, check out its documentation. For example, the following migration creates a products table:
```php copy
<?php

use Phenomine\Support\Database\Migration;
use Phenomine\Support\Database\Schema;
use Phenomine\Support\Database\Blueprint;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->uuidPrimary();
            $table->string('name');
            $table->text('description')
            $table->string('keywords')->nullable();
            $table->decimal('price', [10,2]);
            $table->integer('stock');
            $table->timestamps();
        });
    }

    public function down() : void
    {
        Schema::drop('products');
    }

};

```
### Setting the Migration Connection
By default, Phenomine will use the default database connection defined in your `config/database.php` configuration file. If you would like to use a different database connection, you may modify the `connection` property on your migration class.

```php copy
<?php

/**
 * The database connection that should be used by the migration.
 *
 * @var string
 */
protected $connection = 'pgsql';

/**
 * Run the migrations.
 */
public function up(): void
{
    // ...
}
```

Each connection has its own migrations table, so you may run migrations for multiple connections within the same application. Please note, when you running migration with different connection, the batch number will be reset to 1 for each connection.

## Running Migrations
To run all of your outstanding migrations, execute the migrate command:

```sh copy
php phenomine migrate
```

If you would like to see which migrations have run thus far, you may use the migrate:status command:

```sh copy
php phenomine migrate:status
```

## Rolling Back Migrations
To roll back the latest migration operation, you may use the rollback command. This command rolls back the last "batch" of migrations, which may include multiple migration files:

```sh copy
php phenomine migrate:rollback
```

If you need to rollback all of your migrations, you may use `--all` option:

```sh copy
php phenomine migrate:rollback --all
```

This command will execute the down method of each migration that has run.

## Drop Database and Migrate
The `migrate:reset` command will drop your database entirely and re-run all of your migrations. This command is useful for completely re-building your database:

```sh copy
php phenomine migrate:reset
```

<Callout type="warning">
    The `migrate:reset` command should not be used on production databases. Instead, you should rollback the last migration.
</Callout>

## Tables
### Creating Tables
To create a new database table, use the create method on the Schema class. The create method accepts two arguments: the first is the name of the table, while the second is a closure which receives a Blueprint object that may be used to define the new table:

```php copy
use Phenomine\Support\Database\Schema;
use Phenomine\Support\Database\Blueprint;

Schema::create('users', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('email');
    $table->timestamps();
});
```

When creating the table, you may use any of the schema builder's column methods to define the table's columns.

### Determining If A Table Exists
You may use the hasTable method to determine if a table already exists in the database:

```php copy
if (!Schema::hasTable('users')) {
    Schema::create('users', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('email');
        $table->timestamps();
    });
}
```

### Updating Tables
To update an existing table, you may use the table method on the Schema class. Like the create method, the table method accepts two arguments: the name of the table and a closure that receives a Blueprint object you may use to add columns to the table:

```php copy
use Phenomine\Support\Database\Schema;
use Phenomine\Support\Database\Blueprint;

Schema::table('users', function (Blueprint $table) {
    $table->string('username')->unique();
});
```

### Dropping Tables
To drop a table, you may use the drop method on the Schema class:

```php copy
use Phenomine\Support\Database\Schema;

Schema::drop('users');
```

## Columns
### Creating Columns
To create a new column, you may define in `up()` method. For the example.

```php copy
use Phenomine\Support\Database\Schema;
use Phenomine\Support\Database\Blueprint;

Schema::table('users', function (Blueprint $table) {
    $table->string('username')->unique();
});
```
### Available Column Types
The table builder blueprint offers a variety of methods that correspond to the different types of columns you can add to your database tables. Each of the available methods are listed below:

Column Type  |  Equivalent
-------------|-------------
string |  VARCHAR
text |  TEXT
integer |  INTEGER
bigInteger |  BIGINT
float |  FLOAT
double |  DOUBLE
decimal |  DECIMAL
boolean |  BOOLEAN
date |  DATE
time |  TIME
dateTime |  DATETIME
timestamp |  TIMESTAMP
uuid |  CHAR(36)
id |  BIGINT with auto-increment and primary key
uuidPrimary |  CHAR(36) with primary key
timestamps |  Adds `created_at` and `updated_at` columns

You can specify the length of column with passing length parameter to the column.

### Column Modifiers
In addition to the column types listed above, there are several column "modifiers" you may use when adding a column to a database table. For example, to make the column "nullable", you may use the nullable method:

Modifier  |  Description
--------  |  -----------
`->autoIncrement()`  |  Set INTEGER columns as auto-incrementing.
`->comment('my comment')`  |  Add a comment to a column (MySQL/PostgreSQL).
`->default($value)`  |  Specify a "default" value for the column.
`->nullable($value = true)`  |  Allow NULL values to be inserted into the column.
`->unsigned()`  |  Set INTEGER columns as UNSIGNED (MySQL).
`->primaryKey()` | Set column as PRIMARY KEY
`->unique()` | Set column must UNIQUE
