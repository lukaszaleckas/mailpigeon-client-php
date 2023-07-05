# MailPigeon PHP Client

https://mailpigeon.io PHP Client

## Installation

Run the following command to install the package through Composer:

```sh
composer require lukaszaleckas/mailpigeon-client-php
```

## Usage

### Sending email

```php
use MailPigeon\MailPigeonClient;
use MailPigeon\MailPigeonApi;
use MailPigeon\DTOs\Request\SendEmailDto;

$client = new MailPigeonClient('<your provider secret / api key here>');
$api    = new MailPigeonApi($client);

$api->sendEmail(
    new SendEmailDto(
       'Jon Doe',
       'jon.doe@gmail.com',
       '<your campaign identifier here>',
       'en',
       [
           'some' => 'variable',
       ]
    )
);
```
