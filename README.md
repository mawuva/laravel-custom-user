# Very short description of the package

[![Latest Version on Packagist](https://img.shields.io/packagist/v/mawuekom/laravel-custom-user.svg?style=flat-square)](https://packagist.org/packages/mawuekom/laravel-custom-user)
[![Total Downloads](https://img.shields.io/packagist/dt/mawuekom/laravel-custom-user.svg?style=flat-square)](https://packagist.org/packages/mawuekom/laravel-custom-user)

This is where your description should go. Try and limit it to a paragraph or two, and maybe throw in a mention of what PSRs you support to avoid any confusion with users and contributors.

## Installation

You can install the package via composer:

```bash
composer require mawuekom/laravel-custom-user
```

### Laravel <br/>

After register the service provider to the **`providers`** array in **`config/app.php`**

```php
'providers' => [
    ...
    Mawuekom\CustomUser\CustomUserServiceProvider::class
    ...
];
```
<br/>

Publish package

```bash
php artisan vendor:publish --provider="Mawuekom\CustomUser\CustomUserServiceProvider"
```

## Usage

```php
// Usage description here
```

### Testing

```bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email seddorephraim7@gmail.com instead of using the issue tracker.

## Credits

-   [Ephraïm Seddor](https://github.com/mawuekom)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
