# Ip restrictions Middleware for Laravel

## Installation

```sh
composer require rabianr/laravel-ip-restrictions
```

## Configuration

Publish the config to copy the file to your own config:
```sh
php artisan vendor:publish --tag="iprestrictions"
```

## Usage

Set `iprestrictions` middleware to any route that require Basic Auth.

Define ip addresses in `config/iprestrictions.php` config file.
```php
'whitelist' => array_merge([
    '1.1.1.1',
], array_filter(explode(',', env('IPRESTRICTIONS_WHITELIST', '')))),
```
or in `.env` file
```
IPRESTRICTIONS_WHITELIST=1.1.1.1,1.1.1.2
```
