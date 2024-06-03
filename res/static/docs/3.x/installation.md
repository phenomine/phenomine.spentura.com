---
title: Installation
description: This guide will help you get started with Phenomine. Learn how to install Phenomine and run the development server.
keyword: phenomine installation, phenomine setup, phenomine installation guide
---

# Installation

Welcome to the Phenomine framework! If you're reading this, it probably means you're looking for a quick way to install Phenomine. If you haven't already, make sure to check out the official [Phenomine documentation](https://phenomine.spentura.com) for an introduction to the framework.

## System Requirements
The Phenomine framework has a few system requirements. Make sure that your local machine meets the following requirements:

- PHP ^8.2
- Composer ^2.0

That's all! You ready to install Phenomine.

## Installing Phenomine

### Install via Composer

Before creating your first Phenomine project, you should ensure that your local machine
has PHP and Composer installed. After you have installed PHP and Composer, you may create a new Phenomine project via the Composer create-project command:

```sh copy
composer create-project phenomine/phenomine project-name
```

Make sure to replace `project-name` with the name of the directory in which you want to install the project.
If use stability flag `--stability dev`, it will install from dev branch (but, it's not recommended installing unstable version).

### Run the development server

After the project has been created, run Phenomine's local development server using the Phenomine's CLI `run` command:

```sh copy
cd project-name
php phenomine run
```

Once you have started the Phenomine development server, your application will be accessible in your web browser at `http://localhost:8000`. Of course, you are free to configure the `run` command with a different port number if desired.

### Run the development server with custom port or host
If you want to use different port to run your application, you can use the `--port` option:

```sh copy
php phenomine run --port=80
```

Or, if you wish to make your local application accessible to the local network, you may use the `--host` option:
```sh copy
php phenomine run --port=80 --host=0.0.0.0
```

That's it! Now go build something cool.
