# Turns the QuillJS WYSIWYG rich editor into a FilamentPHP form field and "filamentizes" the UI of the editor.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/eliaszobody/quill-editor.svg?style=flat-square)](https://packagist.org/packages/eliaszobody/quill-editor)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/eliaszobody/quill-editor/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/eliaszobody/quill-editor/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/eliaszobody/quill-editor/fix-php-code-styling.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/eliaszobody/quill-editor/actions?query=workflow%3A"Fix+PHP+code+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/eliaszobody/quill-editor.svg?style=flat-square)](https://packagist.org/packages/eliaszobody/quill-editor)



This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require eliaszobody/quill-editor
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="quill-editor-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="quill-editor-config"
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="quill-editor-views"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

```php
$quillEditor = new Eliaszobody\QuillEditor();
echo $quillEditor->echoPhrase('Hello, Eliaszobody!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [eliaszobody](https://github.com/eliaszobody)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
