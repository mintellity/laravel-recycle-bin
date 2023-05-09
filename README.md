# Recycle Bin for Laravel Models

Recycle bin implementation for Laravel with Livewire.

## Installation

Add this repository to your `composer.json` file:

```json
{
  "repositories": [
    {
      "type": "github",
      "url": "https://github.com/mintellity/laravel-recycle-bin.git"
    }
  ]
}
```

You can install the package via composer:

```bash
composer require mintellity/laravel-recycle-bin
```

Publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-recycle-bin-config"
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="laravel-recycle-bin-views"
```

This package relies on [Eloquents `SoftDeletes`](https://laravel.com/docs/10.x/eloquent#soft-deleting) trait. If you haven't already, add it to your models and migrations.

## Usage

Add each model you want to be able to recycle to the `recycle_bin.models` config array.

```php
return [
    'recycle-models' => [
        App\Models\User::class,
    ],
];
```

You can now use the `RecycleBin`-Livewire-component to restore or force delete your models.

```html
<livewire:recycle-bin::recycle-bin />
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Credits

- [Mintellity GmbH](https://github.com/mintellity)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
