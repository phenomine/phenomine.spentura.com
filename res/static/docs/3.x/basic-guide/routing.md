---
title: Routing
description: Routing in web applications is a way to map URLs to specific pages in the application. Phenomine has a built-in router that allows you to map URLs to pages in your application. Learn how to define routes in Phenomine.
keyword: routing, routes, route, route management, route handling
---

# Routing

Routing in web applications is a way to map URLs to specific pages in the application. For example, if you have a page that displays a list of products, you might want to map the URL `/products` to that page. If you have a page that displays a single product, you might want to map the URL `/products/123` to that page, where `123` is the ID of the product to display.

Phenomine has a built-in router that allows you to map URLs to pages in your application. There are several approaches to defining routes in Phenomine:

## Page Router
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

<Callout type="info">
    If your application is growing, it is recommended to use the traditional way of defining routes in the `routes` directory. This approach is more flexible and allows you to define more complex routes. Page router is suitable for small applications or when you want to keep your routes close to the controller logic.
</Callout>

For performance reasons, if you have a large number of controllers, it is recommended to disable the page router. You can disable the page router by setting the `page_router` option to `false` in the `config/app.php` file.

```php showLineNumbers filename="config/app.php" {6} copy
<?php

return [
    'name' => env('APP_NAME', 'The Phenomine Framework'),
    'env' => env('APP_ENV', 'local'),
    'page_router' => env('PAGE_ROUTER', true)
    ...
];
```

## Basic Routing
The most basic Phenomine routes accept a URI and a closure, providing a very simple and expressive method of defining routes and behavior without complicated routing configuration files:

```php showLineNumbers filename="routes/routes.php" {3-5} copy
use Phenomine\Support\Route;

Route::get('/', function() {
    return 'Hello World';
});
```

## The Default Route Files
All Phenomine routes are defined in your route files, which are located in the `routes` directory. These files are automatically loaded by the framework. The `routes/web.php` file defines routes that are for your web interface.

You can define as many additional route files as you wish. Phenomine has capability to scan all files in the `routes` directory and load them automatically.

For most applications, you will begin by defining routes in your `routes/web.php` file. The routes defined in `routes/web.php` may be accessed by entering the defined route's URL in your browser. For example, you may access the following route by navigating to `http://example.com/user` in your browser:

```php showLineNumbers filename="routes/web.php" {4} copy
use Phenomine\Support\Route;
use App\Controllers\UserController;

Route::get('/user', [UserController::class, 'index']);
```

## Available Router Methods
The router allows you to register routes that respond to any HTTP verb:

HTTP Verb | Description
--- | ---
GET | used to retrieve data from the server.
POST | used to send data to the server.
PUT | used to update data on the server.
PATCH | used to partially update data on the server.
DELETE | used to delete data from the server.


## Defining Routes

You may define routes using a variety of different methods, including Closure callbacks, controllers, or using string. All of these approaches are explained in this documentation.

### Closure Callbacks

The most basic Phenomine routes accept a URI and a closure, providing a very simple and expressive method of defining routes and behavior without complicated routing configuration files:

```php showLineNumbers copy
Route::get('/', function() {
    return 'Hello World';
});
```

### Controllers

If your application is more than just a few routes, you might want to consider placing your route logic in a controller. Controllers can group related route logic into a single class. Controllers are stored in the `app/Controllers` directory.

```php showLineNumbers copy
use App\Controllers\UserController;

Route::get('/user', [UserController::class, 'index']);
```

Or you can use a string to define a controller. The string should be separated by `@` symbol. The first part is the controller class name and the second part is the method name:

```php showLineNumbers copy
Route::get('/user', 'App\Controllers\UserController@index');
```


## The Route List Command
You may use the `route:list` command to view a list of all registered routes for your application. 

```bash
php phenomine route:list
```

This may be useful when debugging or generating URLs to named routes.

You can use `-f` option to show full route file origin path on list.

```bash
php phenomine route:list -f
```
You can also filter the routes by HTTP method with `--method` option. For example:
```bash
php phenomine route:list --method=GET -f
```


## Route Parameters

Let's take a look how Phenomine handles incoming requests and how you can work with them.

### Required Parameters

Sometimes you will need to capture segments of the URI within your route. For example, you may need to capture a user's ID from the URL. You may do so by defining route parameters:

```php showLineNumbers {3-5} copy
use Phenomine\Support\Route;

Route::get('/user/{id}', function (string $id) {
    return 'User '.$id;
});
```

You may define as many route parameters as required by your route:

```php showLineNumbers copy
Route::get('/profile/{profile}/post/{post}', function (string $profileId, string $postId) {
    // ...
});
```

Route parameters are always encased within `{}` braces and should consist of alphabetic characters. Underscores (`_`) are also acceptable within route parameter names. Route parameters are injected into route callbacks / controllers based on their order - the names of the route callback / controller arguments do not matter.

### Optional Parameters

Occasionally you may need to specify a route parameter, but make the presence of that route parameter optional. You may do so by placing a `?` mark after the parameter name. Make sure to give the route's corresponding variable a default value:

```php showLineNumbers copy
Route::get('/user/{name?}', function (?string $name = null) {
    return $name;
});
```

Now, if you browse to `/user` the response will be `null`. If you browse to `/user/John` the response will be `John`.

### Fetch Parameters on Controller
On the controller, you can retrieve the route parameters either through variables on the controller or by using the `request` helper. For example:

```php showLineNumbers copy
public function index(?string $name = null, ?string $age = null) {
    // Directly by variables
    echo $name;

    // Get all params in route
    request()->params();

    // Get route param by name
    request()->params('name');
}
```

## Named Routes

Named routes allow the convenient generation of URLs or redirects for specific routes. You may specify a name for a route by chaining the `name` method onto the route definition:

```php showLineNumbers {3-5} copy
Route::get('/user', function () {
    // ...
})->name('user');
```

<Callout type="warning" emoji="⚠️">
    Route names should always be unique.
</Callout>

### Generating URLs To Named Routes

You may generate URLs to your named routes using the `route` helper:

```php showLineNumbers copy
// Generating URLs...
$url = route('user'); // http://example.com/user
```

If the named route defines parameters, you may pass the parameters as the second argument to the `route` method. The given parameters will automatically be inserted into the URL in their correct positions:

```php showLineNumbers copy
Route::get('/user/{id}', function (string $id) {
    // ...
})->name('user');

$url = route('user', ['id' => 1]); // http://example.com/user/1
```

