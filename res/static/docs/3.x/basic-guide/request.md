---
title: Request
description: Phenomine Request class provides an object-oriented way to interact with the current HTTP request being handled by your application as well as retrieve the input that were submitted with the request.
keyword: phenomine request, phenomine request class, phenomine request handling, phenomine request object
---

# Request

Phenomine `Request` class provides an object-oriented way to interact with the current HTTP request being handled by your application as well as retrieve the input that were submitted with the request.


## Interacting With The Request
### Accessing The Request
To obtain an instance of the current HTTP request, you may use `request()` helper on your route closure or controller method.

```php showLineNumbers copy
<?php

namespace App\Controllers;

class ProductController {

    public function store() {
        $sku = request('sku');
        $name = request('name');
        $price = request('price');

        ...
    }
```

### Accessing Route Parameters
If your controller method is also expecting input from a route parameter, simply use `request()->param()` method. For example, if your route is defined like so:

```php showLineNumbers filename="routes/web.php" {4} copy
use Phenomine\Support\Route;
use App\Controllers\UserController;

Route::post('/user/{id}', [UserController::class, 'update']);
```

You may access your `id` route parameter by calling `request->param()` method as follows:

```php showLineNumbers copy
<?php

namespace App\Controllers;

use App\Models\User;
use Phenomine\Support\Routes\Put;

class UserController {

    #[Put('/{id}')]
    public function update($id)
    {
        // first way
        $user_id = request()->param('id');

        // second way, retrieve the id from the method parameter

        $user = User::findOrFail($id);
        $user->name = request('name');
        $user->save();

        return redirect('/');
    }

}

```
