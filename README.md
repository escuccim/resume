# resume

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

This is a Laravel package which allows you to maintain and display an online CV in multiple languages. 

## Install

Via Composer

``` bash
$ composer require escuccim/resume
```

Add the service provider to config/app.php
```php
Escuccim\Resume\resumeServiceProvider::class,
```

Register the middleware in app/Http\Kernel.php
```php
'admin' => \Escuccim\Resume\Http\Middleware\AdminMiddleware::class,
```

Run the database migrations:
```bash
php artisan migrate
```

Publish the files if you so desire:
```bash
php artisan vendor:publish
```

## Usage
The URI to CV administration is /cvadmin
The URI to education administration is /education.

You should add a route to point to the CV display in your own routes/web.php as follows:
```php
Route::get('[URI]', '\Escuccim\Resume\Http\Controllers\JobsController@cv');
```

The CV display for normal, displays the work history followed by education, and then if you wish to append anything else you can do so by creating the following file:
/resources/views/cv/cv_extras.blade.php

The CV display will include this view if it exists.

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email skooch@gmail.com instead of using the issue tracker.

## Credits

- [Eric Scuccimarra][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/escuccim/resume.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/escuccim/resume/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/escuccim/resume.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/escuccim/resume.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/escuccim/resume.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/escuccim/resume
[link-travis]: https://travis-ci.org/escuccim/resume
[link-scrutinizer]: https://scrutinizer-ci.com/g/escuccim/resume/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/escuccim/resume
[link-downloads]: https://packagist.org/packages/escuccim/resume
[link-author]: https://github.com/escuccim
[link-contributors]: ../../contributors
