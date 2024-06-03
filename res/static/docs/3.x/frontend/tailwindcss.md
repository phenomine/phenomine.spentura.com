---
title: Tailwind CSS
description: Learn how to use Tailwind CSS in your Phenomine project. Tailwind CSS is a utility-first CSS framework for rapidly building custom designs.
keyword: tailwind css, tailwind css in phenomine, tailwind css in phenomine project, phenomine tailwind css
new: true
---

# Tailwind CSS

Tailwind CSS is a utility-first CSS framework for rapidly building custom designs. It's a great choice for building modern and responsive web applications. We know, developers love Tailwind CSS, so Phenomine has built-in support for it. You can use Tailwind CSS in your Phenomine project without any additional configuration.

## Prerequisites

Before you start using Tailwind CSS in your Phenomine project, make sure you have the following prerequisites installed:

- Node & NPM
- Tailwind CSS

If you don't have Node & NPM installed, you can download and install them from the official website. If you haven't installed Tailwind CSS yet, you can install it using the following command:

```bash
npm install -D tailwindcss
```

## Installation

To install the dependencies, run the following command:

```bash
npm install
```

This command will install all the required dependencies, including Tailwind CSS.

## Configuration

### Phenomine Configuration
By default, you don't need to configure Tailwind CSS in your Phenomine project. Phenomine comes with a pre-configured Tailwind CSS setup. However, if you want to customize the Tailwind CSS configuration, you can change the `config/app.php` file.

```php
<?php

return [
    ...
    'tailwindcss' => [
        'source' => 'res/css/app.css',
        'output' => 'public/build/css/app.css',
    ],
];
```

In the above configuration, you can change the `source` and `output` paths according to your project structure.

### Tailwind CSS Configuration

If you want to customize the Tailwind CSS configuration, you can modify `tailwind.config.js` file in the root directory of your project. You can use this file to customize the Tailwind CSS configuration.

```js
import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './storage/framework/views/*.php',
        './res/views/**/*.latte.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [],
};
```

## Include Tailwind CSS
To include Tailwind CSS in your latte views, you can simply insert `{tailwindcss}` at the top of your view file. Here is an example:

```html copy {8-9}
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>

    <!--  Tailwind CSS  -->
    {tailwindcss}

</head>
<body>
</body>
</html>
```

## Building Assets

To build the assets, run the following command:

```bash
php phenomine tailwindcss
```

This command will compile the Tailwind CSS and generate the CSS file that configured in the `config/app.php` file. Or, if you want to watch the changes and build the assets automatically, you can run the following command:

```bash
php phenomine tailwindcss --watch
```

This command will watch the changes in your `res/views` directory and build the assets automatically.

## Tailwind CSS in Production

When you run `php phenomine tailwindcss`, it will automatically determine the environment and build the assets accordingly. If you set the `APP_ENV` to `production`, it will build the assets minified and optimize for production.

That's it! You have successfully installed and configured Tailwind CSS in your Phenomine project. Now you can start building modern and responsive web applications using Tailwind CSS.
