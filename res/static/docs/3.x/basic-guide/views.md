---
title: Views
description: Views separate your controller / application logic from your presentation logic and are stored in the `res/views` directory. Learn how to create and pass data to views in Phenomine.
keyword: phenomine views, phenomine views tutorial, phenomine views guide
---

# Views

Phenomine architecture is based on the MVC pattern. Of course, it's not practical to return entire HTML documents strings directly from your routes and controllers. Thankfully, views provide a convenient way to place all of our HTML in separate files.

## Creating Views

Views separate your controller / application logic from your presentation logic and are stored in the `res/views` directory. When using Phenomine, view templates are usually written using the [Latte templating language](https://latte.nette.org/). A simple view might look something like this:

```html filename="res/views/greeting.latte.php" copy showLineNumbers
{* View stored in res/views/greeting.latte.php *}

<!DOCTYPE html>
<html>
<head>
    <title>Phenomine</title>
</head>
<body>
    <h1>Hello, {$name}!</h1>
</body>
</html>
```

Since this view is stored at `res/views/greeting.latte.php`, we may return it using the global view helper like so:

```php showLineNumbers copy
Route::get('/greeting', function () {
    return view('greeting', ['name' => 'Fahli']);
});
```

<div class="flex items-center p-4 mb-4 text-sm text-blue-800 border border-blue-300 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400 dark:border-blue-800" role="alert">
  <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
  </svg>
  <span class="sr-only">Info</span>
  <div>
    Looking for a more in-depth tutorial on how to write Latte templates? Check out the official <a href="https://latte.nette.org/en/guide" target="_blank" class="text-blue-600 hover:underline">Latte Documentation</a>.
  </div>
</div>

## Nested View Directories

Views may also be nested within subdirectories of the `res/views` directory. "Dot" notation may be used to reference nested views. For example, if your view is stored at `res/views/admin/profile.latte.php`, you may return it from one of your application's routes / controllers like so:

```php showLineNumbers copy
return view('admin.profile', $data);
```

## Passing Data To Views

As you saw in the previous examples, you may pass an array of data to views:

```php showLineNumbers copy
return view('greeting', ['name' => 'Fahli']);
```

When passing information in this manner, the data should be an array with key / value pairs. Inside your view, you can then access each value using its corresponding key, such as `{$name}`.

## Caching

By default, Latte template views are compiled on demand. When a request is executed that renders a view, Phenomine will determine if a compiled version of the view exists. If the file exists, Phenomine will then determine if the uncompiled view has been modified more recently than the compiled view. If the compiled view either does not exist, or the uncompiled view has been modified, Phenomine will recompile the view. Compiled views are stored in the `storage/framework/views` directory. So, make sure this directory is writable by the web server.

However, the compiled view will take up a lot of storage. Phenomine provides a command that may be used to clear all cache of your views:

```bash
php phenomine view:clear
```
