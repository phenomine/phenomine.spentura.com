---
title: Getting Started
description: Phenomine provides a convenient way to running database queries. It can be used to perform most database operations in your application. For the present time, Phenomine is only capable of supporting SQL databases including MySQL, MariaDB, PostgreSQL, SQLite, and SQL Server.
keyword: phenomine database, phenomine database library, phenomine database handling, phenomine database management
---

# Database

Phenomine provides a convenient way to running database queries. It can be used to perform most database operations in your application. For the present time, Phenomine is only capable of supporting SQL databases including MySQL, MariaDB, PostgreSQL, SQLite, and SQL Server.

The Phenomine database class uses PDO parameter binding to protect your application against SQL injection attacks.

## Database Configuration
Before you perform a query to the database, you must first set up the database. Phenomine provides a simpler way to configure your database. To configure the database, go to the config/database.php file and set the database connection credentials.

```php showLineNumbers filename="config/database.php" copy
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

### SQLite Configuration
SQLite databases are contained within a single file on your filesystem. You can create a new SQLite database using the touch command in your terminal: touch database/database.sqlite. After the database has been created, you may easily configure your environment variables to point to this database by placing the absolute path to the database in the DB_DATABASE environment variable:

```env
DB_CONNECTION=sqlite
DB_DATABASE=/absolute/path/to/database.sqlite
```

## Running Queries
Once you have configured your database connection, you may run queries using the `DB` class. The `DB` class provides methods for each type of query: `select`, `update`, `insert`, `delete`, and `statement`.

### Running a Select Query
To run a basic query, you may use the `select` method on the `DB` class. The `select` only building the query and not executing it. To execute the query, you must call the `get` method.

```php showLineNumbers copy
DB::table('products')->select('sku', 'name')->get();
```

### Fetch All Rows
To fetch an entire row from the database, simply use the `all()` method.

```php showLineNumbers copy
DB::table('products')->all();
```

### Inserting Row To A Table
To insert row, you may use the `insert` method.

```php showLineNumbers copy
DB::table('products')->insert([
    'sku' => $sku,
    'name' => 'Product 1',
    'price' => 1000
]);
```

### Updating Data
To update data, you may use the `update` method.

```php showLineNumbers copy
DB::table('products')->update([
    'price' => 2000
])->where('sku', '=', 1234);
```

### Deleting Data
To delete data, you may use the `delete` method.

```php showLineNumbers copy
DB::table('products')
    ->where('sku', '=', 1234)
    ->delete();
```

## Using Multiple Database Connections
When using multiple database connections, you may access each connection via the `connection` method on the `DB` class. The name passed to the connection method should correspond to one of the connections listed in your `config/database.php` configuration file.

```php showLineNumbers copy
DB::connection('pgsql')->table('products')->select('sku', 'name')->get();
```

## Database Transactions
You may use the transaction method provided by the `DB` class to run a set of operations within a database transaction. If an exception is thrown within the transaction closure, the transaction will automatically be rolled back and the exception is re-thrown. If the closure executes successfully, the transaction will automatically be committed. You don't need to worry about manually rolling back or committing while using the transaction method:

```php showLineNumbers copy
DB::transaction(function () {
    DB::table('products')->insert([
        'sku' => $sku,
        'name' => 'Product 1',
        'price' => 1000
    ]);

    DB::table('products')->update([
        'price' => 2000
    ])->where('sku', '=', 1234);
});
```

### Manual Transactions
If you would like to begin a transaction manually and have complete control over rollbacks and commits, you may use the beginTransaction method provided by the `DB` class:

```php showLineNumbers copy
DB::beginTransaction();
```

You can rollback the transaction via the rollBack method:

```php showLineNumbers copy
DB::rollBack();
```

Finally, you can commit the transaction via the commit method:

```php showLineNumbers copy
DB::commit();
```

## Credits
Phenomine database class uses the [doctrine/dbal](https://www.doctrine-project.org/projects/dbal.html) package to provide a simple database abstraction layer. With our own implementation, we have made it easier to use and more convenient for Phenomine users.
