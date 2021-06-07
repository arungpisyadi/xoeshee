# XOESHEE
[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]

X-tra Ordinary Ecommerce Solution - Highly Customizable and Efficient Resource Engine.

# REQUIREMENTS
* PHP 7.3 or up.
* MySQL or PostgreSQL
* Composer
* NodeJS and NPM

## Installation

Via Composer

``` bash
$ composer require arungpisyadi/xoeshee
```

## Usage
Go to [Wiki](https://github.com/arungpisyadi/xoeshee/wiki) for a complete documentation.

## Change log

Please see the [changelog](changelog.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [contributing.md](contributing.md) for details and a todolist.

## Security

If you discover any security related issues, please email author email instead of using the issue tracker.

## License

license. Please see the [license file](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/arungpisyadi/xoeshee.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/arungpisyadi/xoeshee.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/arungpisyadi/xoeshee/master.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/12345678/shield

[link-packagist]: https://packagist.org/packages/arungpisyadi/xoeshee
[link-downloads]: https://packagist.org/packages/arungpisyadi/xoeshee
[link-travis]: https://travis-ci.org/arungpisyadi/xoeshee
[link-styleci]: https://styleci.io/repos/12345678
[link-author]: https://github.com/arungpisyadi
[link-contributors]: ../../contributors

## Credits and History
- [SecTheater](https://github.com/SecTheater)

This package is actually built based on [Marketplace](https://github.com/SecTheater/marketplace) package by [SecTheater](https://github.com/SecTheater) which was started as a forked solution on a project. Then, along the way I found that the package has several unfriendly and non-movable setup like how the users table needed to be modified and the users permission function that's a bit hard to modify. So, from forked repository I decided to rebuild the package with my knowledge thinking that this package would be needed to be a starting engine in any e-commerce projects by any developers in the world.

The plan is to have this package packe with basic but customizable features, for example:
1. B2B system that supports multivendor shops where each shop can have their own store url. Although, this package can also be used to serve as a single store ecommerce solution.
2. Coupons system that can be sold as a product or as a gift from a vendor to a customer.
3. Discount system that can automatically calculate price before/after tax, per product or per total cart amount based, and modified by each vendor.
4. Many more to add.

## Notes
1. This package is not ready yet for release, put on packagist only for testing.