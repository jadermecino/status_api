# Status_API powered by Laravel 5.3

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

To install Status API open command line and write:
```sh
$ cd /path/to/app
$ composer install
```
After installing Laravel, you may need to configure some permissions. Directories within the `storage` and the `bootstrap/cache` directories should be writable by your web server or Laravel will not run.

### Database

Import file `docs/data_and_structure.sql` into mysql database

### .env file

Rename `.env.example` to `.env` and set all variables with prefix `DB_` according case for mysql credentials. After this run command:

```sh
$ php artisan key:generate
$ php artisan serve
```

And navigate for **127.0.0.1:8000**
