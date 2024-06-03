---
title: Release Notes
description: Phenomine 3 continues the improvements made in Phenomine 2.x by introducing the support for alter schema on migration, multiple database connections, database transactions, improvements to the model class and seeder, model events, new console command of `migrate:reset` and `migrate:status`, and more.
keyword: phenomine 3 release notes, phenomine 3, phenomine 3 features, phenomine 3 improvements
new: true
---

# Release Notes

## Versioning Scheme
Phenomine follow Semantic Versioning. Minor and patch releases should never contain breaking changes.

When referencing the Phenomine framework or its components from your application or package, you should always use a version constraint such as ^3.0, since major releases of Phenomine do include breaking changes. However, we strive to always ensure you may update to a new major release in one day or less.

## Phenomine 3
Phenomine 3 continues the improvements made in Phenomine 2.x by introducing the support for alter schema on migration, multiple database connections, database transactions, improvements to the model class and seeder, model events, new console command of `migrate:reset` and `migrate:status`, and more.

### PHP 8.2
Phenomine 3.x requires a minimum PHP version of 8.2.

### Page Router
Phenomine 3 introduces a new page router that allows you to define routes for your application using a simple and expressive syntax. The page router is designed to be easy to use and understand, while still providing powerful features for building complex applications. You can define routes directly inside the controller class using attributes.

```php showLineNumbers filename="app/Controllers/ProductController.php" {12-14} copy
<?php

namespace App\Controllers;

use Phenomine\Support\Routes\Delete;
use Phenomine\Support\Routes\Get;
use Phenomine\Support\Routes\Post;
use Phenomine\Support\Routes\Put;

class ProductController {

    #[Get('/', 'product.index')]
    public function index() {
    }

    #[Post('/')]
    public function store() {
    }

    #[Put('/{id}')]
    public function update($id) {
    }

    #[Delete('/{id}/delete')]
    public function destroy($id) {
    }

}

```


### Database Migration
Phenomine introduces the ability to alter schema on migration. You can now add, modify, or drop columns on an existing table.

```php
<?php

use Phenomine\Support\Database\Migration;
use Phenomine\Support\Database\Schema;
use Phenomine\Support\Database\Blueprint;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->uuidPrimary();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamps();
        });
    }

    public function down() : void
    {
        Schema::drop('users');
    }

};
```

### Multiple Database Connections
Phenomine allows you to define multiple database connections in your application. You can specify which connection to use when running a query.

This is useful when you need to connect to multiple databases in the same application. You can pass the connection name to the `connection` method on the query builder.

```php
DB::connection('mysql')->table('users')->get();
```

or you can use the `on` method on the model class.

```php
class User extends Model
{
    protected string $connection = 'mysql';
}
```

The new database migration also supports multiple connections. You can specify the connection name on the migration class.

```php
<?php

/**
 * The database connection that should be used by the migration.
 *
 * @var string
 */
protected string $connection = 'mysql';

/**
 * Run the migrations.
 */
public function up(): void
{
    // ...
}
```

You can define any number of connections in your `config/database.php` configuration file.

```php
'connections' => [
    'mysql' => [
        'driver' => 'mysql',
        'host' => env('DB_HOST', '127.0.0.1'),

        ...
```

### Query Builder
Phenomine introduces a new query builder that allows you to build complex database queries using a simple and expressive syntax. The query builder is designed to be easy to use and understand, while still providing powerful features for building complex queries.

```php
DB::table('users')->where('id', '=', 1)->get();
```

You can chain multiple methods to build complex queries.

```php
DB::table('users')
    ->where('id', '=', 1)
    ->orWhere('email', '=', 'email@phenomine.spentura.com')
    ->get();
```

### Database Transactions
Phenomine introduces database transactions. You can use transactions to ensure that a series of queries are executed as a single unit of work. If any query fails, the entire transaction is rolled back.

```php
DB::transaction(function () {
    DB::table('users')->update(['active' => 1]);
    DB::table('posts')->delete();
});

DB::beginTransaction();
try {
    DB::table('users')->update(['active' => 1])->where('id', '=', 1);
    DB::table('posts')->delete();
    DB::commit();
} catch (\Exception $e) {
    DB::rollBack();
}
```

### Mirage ORM
Phenomine introduces a new Mirage ORM that allows you to interact with your database using an object-oriented approach. The Mirage ORM is designed to be easy to use and understand, while still providing powerful features for building complex applications.

```php
class User extends Model
{
    protected string $table = 'users';
}
```

The Mirage ORM supports relationships, events, mutators, accessors, and more. It also uses the query builder under the hood to build complex queries.

### Model Events
Phenomine introduces model events. You can use model events to hook into the lifecycle of your model. For example, you can use model events to perform actions before or after a model is created, updated, or deleted.

```php

class User extends Model
{
    protected string $table = 'users';

    public static function boot() {
        parent::boot();

        static::creating(function ($user) {
            $user->password = password_hash($user->password, PASSWORD_DEFAULT);
        });
    }
}
```

### Model Mutators & Accessors
Phenomine introduces model mutators and accessors. You can use mutators to modify the value of an attribute before it is saved to the database. You can use accessors to modify the value of an attribute when it is retrieved from the database.

```php
class User extends Model
{
    protected string $table = 'users';

    public function setPasswordAttribute($value) {
        $this->attributes['password'] = password_hash($value, PASSWORD_DEFAULT);
    }

    public function getNameAttribute($value) {
        return ucfirst($value);
    }
}
```

### Database Seeder
Phenomine introduces a new database seeder that allows you to seed your database with test data. You can use seeders to populate your database with sample data for testing or development purposes.

```php
<?php

namespace Database\Seeders;

use Phenomine\Support\Seeder;

class DatabaseSeeder extends Seeder {

    public function run() {
        $this->call([
            UserSeeder::class,
        ]);
    }

}
```
And you can define your seeder class like so:

```php
<?php

namespace Database\Seeders;

use App\Models\User;
use Phenomine\Support\Seeder;

class UserSeeder extends Seeder {

    public function run() {
        User::create([
            'name' => 'John Doe',
            'email' => 'john@doe.com'
        ]);
    }

}
```

### HTMX
Phenomine introduces HTMX support. HTMX is a library that allows you to build modern web applications using HTML, CSS, and JavaScript. When you use HTMX, you can create dynamic web pages without writing a lot of JavaScript code.

```html
<div hx-get="/user/1" hx-trigger="click">
    Click me
</div>

<div hx-post="/user" hx-trigger="submit">
    <input type="text" name="name">
    <button type="submit">Submit</button>
</div>
```

You can focus on writing back-end code and let HTMX handle the front-end interactions. By default, Phenomine includes the HTMX library in your application. You can change the configuration in the `config/app.php` file.

```php
<?php

return [
    ...
    'use_htmx' => env('USE_HTMX', true),
    ...
];
```

If htmx is enabled, Phenomine will automatically include the HTMX library in your application out-of-the-box.

<div class="flex items-center p-4 mb-4 text-sm text-blue-800 border border-blue-300 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400 dark:border-blue-800" role="alert">
  <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
  </svg>
  <span class="sr-only">Info</span>
  <div>
    Please refer to the <a href="https://htmx.org" target="_blank" class="text-blue-600 hover:underline">HTMX Documentation</a> for more information on how to use HTMX in your Phenomine application.
  </div>
</div>

### Console Command
Phenomine introduces new console commands for managing your application. You can use the `migrate:reset` command to reset all of your migrations and the `migrate:status` command to check the status of your migrations.

```sh
php phenomine migrate:reset
php phenomine migrate:status
```

### Relationships

Mirage allows you to define relationships between models. To define a relationship, you place a method on your model that returns the result of the relationship. The method typically calls one of the relationship methods on the `Phenomine\Support\Database\Mirage\Model` class:

```php
<?php

namespace App\Models;

use Phenomine\Support\Database\Mirage\Model;

class User extends Model
{
    /**
     * Get the posts record associated with the user.
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
```
