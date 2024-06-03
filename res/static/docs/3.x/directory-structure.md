---
title: Directory Structure
description: Phenomine follows the MVC (Model-View-Controller) architectural pattern. This guide will help you understand the directory structure of a Phenomine application.
keyword: phenomine directory structure, phenomine mvc, phenomine directory structure guide
new: true
---

# Directory Structure

The default directory structure of a Phenomine application is designed to provide a clean and organized layout for your application. This guide will help you understand the directory structure of a Phenomine application and how to navigate the different directories and files.

```plaintext
<root>
├── app
│   ├── Controllers
│   ├── Models
│   └── Middlewares
├── config
│   ├── app.php
│   ├── database.php
│   └── session.php
├── db
│   ├── migrations
│       └── 2024_01_01_0000_create_users_table.php
│   └── seeders
│       └── DatabaseSeeder.php
├── public
│   ├── index.php
│   └── .htaccess
├── res
│   ├── css
│       └── app.css
│   └── views
│       └── welcome.latte.php
├── routes
│   └── web.php
├── storage
│   ├── app
│   └── framework
│       └── cache
│       └── sessions
│       └── views
└── vendor
```

## The Root Directory

When you create a new Phenomine application, you will see the following files and directories in the root directory:

### The App Directory

The `app` directory contains the core code of your application. This directory is where you will define your controllers, models, views, and other application-specific code.

### The Config Directory

The `config` directory contains all of your application's configuration files. This directory is where you will define your database connection settings and other configuration options. You can also create custom configuration files in this directory. You can access all the configuration using the `config()` helper function with the parameter of the configuration file and array key separated by a dot.

### The DB Directory

The `db` directory contains all of your application's database-related files. This directory is where you will define your database migrations and seeders. You can also create custom database-related files in this directory.

### The Public Directory

The `public` directory contains all of your application's publicly accessible files, such as images, stylesheets, and JavaScript files. This directory is where you will place your assets that need to be accessible from the web.

### The Res Directory

The `res` directory contains all of your application's non-publicly accessible files, such as views, language files, and other resources. This directory is where you will place your application's resources that do not need to be accessed directly from the web. It also contains the default css integrates with Tailwind CSS.

### The Routes Directory

The `routes` directory contains all of your application's route files. This directory is where you will define your application's routes and route groups. You can also create custom route files in this directory. Phenomine will automatically load all the route files in this directory.

### The Storage Directory

The `storage` directory contains all of your application's storage files, such as logs, cache files, and session files. This directory is where you will store all of your application's temporary and persistent storage files.

### The Vendor Directory

The `vendor` directory contains all of your application's Composer dependencies. This directory is where Composer will install all of the packages required by your application.


## Digging Deeper

### Inside the App Directory

The `app` directory contains the following subdirectories:

- The `Controllers` directory contains all of your application's controller classes. Controllers are responsible for handling incoming HTTP requests and returning responses to the client.
- The `Models` directory contains all of your application's model classes. Models are responsible for interacting with your application's database tables.
- The `Middlewares` directory contains all of your application's middleware classes. Middleware is a mechanism for filtering HTTP requests entering your application.

### Inside the Config Directory

The `config` directory contains the following files:

- The `app.php` file contains your application's general configuration settings, such as the application name and environment.
- The `database.php` file contains your application's database connection settings.
- The `session.php` file contains your application's session configuration settings.

### Inside the DB Directory

The `db` directory contains the following subdirectories:

- The `migrations` directory contains all of your application's database migration files. Migrations are used to create and modify database tables.
- The `seeders` directory contains all of your application's database seeder files. Seeders are used to populate your database with sample data.

### Inside the Public Directory

The `public` directory contains the following files:

- The `index.php` file is the entry point for all HTTP requests to your application. This file loads the Composer autoloader and starts the Phenomine application.
- The `.htaccess` file is used to configure Apache's URL rewriting capabilities.

### Inside the Res Directory

The `res` directory contains the following subdirectories:

- The `css` directory contains your Tailwind CSS stylesheet files.
- The `views` directory contains all of your application's view files. Views are responsible for rendering the HTML output of your application.

### Inside the Routes Directory

The `routes` directory contains the following files:

- The `web.php` file contains all of your application's web routes. Web routes are used to define routes that are accessible from the web.

### Inside the Storage Directory

The `storage` directory contains the following subdirectories:

- The `app` directory contains all of your application's temporary storage files.
- The `framework` directory contains all of your application's cache and session files.
