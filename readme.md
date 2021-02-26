# Stringify 👨‍🎨

**A framework agnostic** string manipulation package. *Start ❤️ string manipulations again!*
Feeling paranoid about string manipulations? Hating regex? Hating string chunks, replacements, concatinations? This package is for you!

## System Requirements

- PHP >= 7.2 (the latest stable version of PHP is highly recommended)



## Installation

~~~php
composer require tafhyseni/stringify
~~~



## Usage

Stringify is a package made for human. Makes manipulation easier, simpler and elegant.

~~~php
use \Tafhyseni\Stringify\Stringify;
~~~



### Examples

Cutting a string after a certain word

~~~php
Stringify::parse('Cut this string from here...')->removeAfter('from')->get();
~~~

Removing x-number of last characters

~~~php
Stringify::parse('Remove3ofmylastcharacters')->removeLastChars(3)->get();
~~~

Removing HTML from a string/text expect a certain tag

~~~php+HTML
$htmlInput = "<p>Test paragraph.</p><!-- Comment --> <a href="#fragment">Other text</a>";

Stringify::parse('<p>Test paragraph.</p><!-- Comment --> <a href="#fragment">Other text</a>')->removeHtmlExpect('<a>');
~~~



## Documentation

Please see [DOCUMENTATION](DOCUMENTATION.md) for all available methods on string/text/html manipulation.



## Testing

~~~bash
./vendor/bin/phpunit
~~~



## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.



## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.



## Security

If you discover any security related issues, please email tafhyseni@gmail.com instead of using the issue tracker.



## Credits

- [Mustafe Hyseni](https://github.com/tafhyseni)
- [All Contributors](../../contributors)



## License

The MIT License (MIT). Please see [License File](https://github.com/spatie/laravel-backup/blob/master/LICENSE.md) for more information.