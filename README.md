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
This package basically contains 3 services which are,
1) Graydon Search Service - Company search and listing 
2) Graydon Company Service - To get company information in different way
3) Graydon Monitoring Service - Get/Set/Delete monitoring events related to specific company.

### Graydon Search Service
####Search 
This Method accepts 1 optional parameter in which you can pass different key and value pair as array to retrieve data accordingly. If nothing pass to the function it will return all companies.
You can search by below params:
1) graydonCompanyId
2) registrationId
3) companyName
4) address
5) keyword
6) startrow
7) maxrows
### Graydon Company Service
This Service is useful to get information related to company in different way. 
#### Get
This function will accept 3 parameters. 
1) $company_id (ID for which you want to get information)
2) $other_uri (Optional, default this can be blank and return company information)
3) $data (optional, array, It can be extra parameter for which you want to perform search)

##### Options for $other_uri can be:
1) company-profile
2) branches
3) credit-scores
4) opportunity-scores
5) financial-summary
6) managers
7) shareholders
8) participation
9) group-structure
10) declaration-of-liability
11) other
12) xseptions
13) events
### Graydon Monitoring Service
This service is useful to retrieve and set monitoring on specific company. 
#### Get
This function will accept 2 parameters as argument.
1) $company_id
2) $data 
#### Set
This function will accept 2 parameters as argument.
1) $company_id
2) $data  
## Docs
[https://innotec.co.uk](https://innotec.co.uk)
## Security contact information
To report a security vulnerability, please use the
[Innotec Website](https://innotec.co.uk).
## Credits
### Contributors
This project exists thanks to all the people who <a href="https://github.com/InnotecScotlandLtd/DarcyQuigleySalesforce/graphs/contributors" target="_blank">contribute</a>.
