# Graydon
[![Latest Stable Version]()](https://innotec.co.uk)
[![Total Downloads]()]()
[![Build Status]()]()

A package for Graydon API. [https://innotec.co.uk]

## Installation via Composer

### Require the package

```
$ composer require innotecscotlandltd/graydon
```
```json
{
    "require": {
        "innotecscotlandltd/graydon": "dev-master"
    }
}
```
Put this as psr4 in main composer.json
```
"InnotecScotlandLtd\\Graydon\\": "path-to-package/Graydon/src/"
```
Put this as repositories object
```
"repositories": [
    {
      "type": "vcs",
      "url": "https://github.com/InnotecScotlandLtd/Graydon"
    }
  ],
```
Add the Service Provider to your config/app.php under providers

```
\InnotecScotlandLtd\Graydon\Providers\GraydonServiceProvider::class,
```

Publish the configuration file
```
php artisan vendor:publish
```
This will create a graydon.php within your config directory. Edit the relevant values in the graydon.php file.

## Usage

## Docs
[https://innotec.co.uk](https://innotec.co.uk)
## Security contact information
To report a security vulnerability, please use the
[Innotec Website](https://innotec.co.uk).
## Credits
### Contributors
This project exists thanks to all the people who <a href="https://github.com/InnotecScotlandLtd/DarcyQuigleySalesforce/graphs/contributors" target="_blank">contribute</a>.
