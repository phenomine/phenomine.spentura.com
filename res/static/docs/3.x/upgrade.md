---
title: Upgrade Guide
description: Learn how to upgrade your Phenomine application from 2.x to 3.x.
keyword: phenomine upgrade, phenomine upgrade guide, phenomine 2.x to 3.x upgrade
---
# Upgrade Guide

## Upgrading to 3.x from 2.x
You can migrate the Phenomine 2.x to 3.x easily by following this guide.

## High Impact Changes

### Updating Dependencies
- Phenomine now requires PHP 8.2 or greater.

You should update the following dependencies in your application's composer.json file:
- `phenomine/framework` to `^3.0`

Finally, examine any other third-party packages consumed by your application and verify you are using the proper version for Phenomine 3.x support.

### Env File
Phenomine 3.x removed the `DB_DRIVER` environment variable. You should replace it with `DB_DRIVER` with `DB_CONNECTION` in your `.env` file.

```env
APP_NAME="The Phenomine Framework"
APP_ENV=local #production, local
PAGE_ROUTER=true


DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=phenomine
DB_USERNAME=root
DB_PASSWORD=
```

### Database Configuration
Phenomine 3.x introduces the ability to define multiple database connections. You should update your `config/database.php` file to define your database connections.

```php
<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the database connections below you wish
    | to use as your default connection for database operations. This is
    | the connection which will be utilized unless another connection
    | is explicitly specified when you execute a query / statement.
    |
    */

    'default' => env('DB_CONNECTION', 'mysql'),


    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | Below are all of the database connections defined for your application.
    | An example configuration is provided for each database system which
    | is supported by Phenomine. You're free to add / remove connections.
    |
    */

    'connections' => [
        'sqlite' => [
            'driver' => 'sqlite',
            'database' => env('DB_DATABASE', database_path('database.sqlite')),
        ],

        'mysql' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'phenomine'),
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', ''),
            'socket' => env('DB_SOCKET', ''),
            'charset' => env('DB_CHARSET', 'utf8mb4')
        ],

        'pgsql' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'phenomine'),
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => env('DB_CHARSET', 'utf8'),
        ],

        'sqlsrv' => [
            'driver' => 'sqlsrv',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '1433'),
            'database' => env('DB_DATABASE', 'phenomine'),
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', ''),
            'options' => []
        ],
    ],

    'migration_table' => 'migrations'
];
```

### App Configuration
Phenomine 3.x introduces the new page router configuration. You should update your `config/app.php` file to define the page router configuration.

```php
<?php

return [
    'name' => env('APP_NAME', 'The Phenomine Framework'),
    'env' => env('APP_ENV', 'local'),
    'page_router' => env('PAGE_ROUTER', true),
    'use_htmx' => env('USE_HTMX', true),
];

```

### Mirage ORM
You should update your models to extend the `Phenomine\Support\Database\Mirage\Model` class from the old `Phenomine\Support\Model` class.

```php
<?php

namespace App\Models;

use Phenomine\Support\Database\Mirage\Model;

class User extends Model
{
    //
}
```

### Database Migrations
You should rewrite all your database migrations with the new migration structure. The new migration structure is more flexible and allows you to define more complex migrations.

The old migration structure:

```php
<?php

use Phenomine\Support\Database\Migration;

class migration_20231110113113_users extends Migration {
    protected $table = 'users';

    public function up() {
         $this->id();
         $this->string('name');
         $this->string('email')->unique();
    }

    public function down() {
        $this->dropTableIfExists();
    }
}
```

The new migration structure:

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

<div class="flex items-center p-4 mb-4 text-sm text-yellow-800 border border-yellow-300 rounded-lg bg-yellow-50 dark:bg-yellow-50 dark:bg-opacity-70 dark:text-yellow-600 dark:border-yellow-800" role="alert">
  <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
  </svg>
  <span class="sr-only">Info</span>
  <div>
    The old migration structure is no longer supported in Phenomine 3.x. You should rewrite all your database migrations with the new migration structure.
  </div>
</div>

### Database Seeders
You should create a new seeder called `DatabaseSeeder` in the `db/seeders` directory. The new seeder structure is more flexible and allows you to order the seeders.

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

Phenomine `db:seed` command will called the `DatabaseSeeder` class by default and no longer scan the `db/seeders` directory. This changes allow you to control the order of the seeders.

## Low Impact Changes

### Page Router
Page router is introduced in Phenomine 3. It is a simple way to define routes in your application directly inside the controllers. This approach is useful for small applications or when you want to keep your routes close to the controller logic.

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

In the example above, we define four routes in the `ProductController` class. The `#[Get]`, `#[Post]`, `#[Put]`, and `#[Delete]` attributes are used to define the HTTP method and the URL pattern for each route. The second argument is optional as the route name. If you don't provide the route name, it will set to null.

### HTMX
Phenomine 3.x introduces the new HTMX supports. You can keep the old Phenomine 2.x behavior by setting the `use_htmx` option to `false` in the `config/app.php` file.
