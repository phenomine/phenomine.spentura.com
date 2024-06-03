---
title: Controllers
description: Controllers can group related request handling logic into a single class. Learn how to write controllers in Phenomine.
keyword: controllers, controller, controller management, controller handling
---

# Controllers

Instead of defining all of your request handling logic as closures in your route files, you may wish to organize this behavior using "controller" classes. Controllers can group related request handling logic into a single class. For example, a `UserController` class might handle all incoming requests related to users, including showing, creating, updating, and deleting users. By default, controllers are stored in the `app/Controllers` directory.

## Writing Controller
To quickly generate a new controller, you may run the `make:controller` command. By default, all of the controllers for your application are stored in the `app\Controllers` directory.

```sh copy
php phenomine make:controller UserController
```

Let's take a look at an example of a basic controller. A controller may have any number of public methods which will respond to incoming HTTP requests:
```php showLineNumbers copy
<?php

namespace App\Controllers;

use App\Models\User;
use Phenomine\Support\Routes\Post;

class UserController {

    #[Post('/')]
    public function store()
    {
        User::create([
            'name' => request('name');
        ]);

        return redirect('/');
    }

}

```

### Controller Inside Directory
You can manage your controller files based on a smaller scope by putting them in a separate directory. For example, you have a `Warehouse` scope in your application, which includes `ProductController`. Then you want to create a ProductController inside the warehouse directory.UserController

```sh copy
php phenomine make:controller Warehouse/ProductController
```

Or you can use `.` dot to separate directory, for example:

```sh copy
php phenomine make:controller Warehouse.ProductController
```

<Callout type="warning" emoji="⚠️">
    Avoid using the backslash "\\". Phenomine will automatically remove the character and merge the strings together.
</Callout>
