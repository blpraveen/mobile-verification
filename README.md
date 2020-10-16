## Introduction
This Package allows you to verfiy mobile.

## Installation

You can install the package via composer:

```shell
composer require blpraveen/mobile-verification
```
> Laravel 5.5 uses Package Auto-Discovery, so you are not required to add ServiceProvider manually.

### Laravel <= 5.4.x

If you don't use Auto-Discovery, add the ServiceProvider to the providers array in ``config/app.php`` file

```php
'providers' => [
  /*
   * Package Service Providers...
   */
  Blpraveen\MobileVerification\MobileVerificationServiceProvider::class,
],
```


## Configuration

To get started, you should publish the `config/mobile_verification.php` config file with:

```
php artisan vendor:publish --provider="Blpraveen\MobileVerification\MobileVerificationServiceProvider" --tag="config"
```

If you’re using another table name for `users` table, you can customize their values in config file:

```php
// config/mobile_verification.php

<?php

return [

    'user_table'    => 'users',

    //...
];
```

And then migrate the database:
```
php artisan migrate
``` 

The package migration will alter the `users` table  with `phone_verified_at` column and 'verification_code'.

### Model Preparation

In the following, verify that your `User` model implements the `Blpraveen\MobileVerification\Contracts\MustVerifyMobile` contract and use the `Blpraveen\MobileVerification\Concerns\VerifyMobile` trait:

```php
<?php

namespace App;

use Blpraveen\MobileVerification\Contracts\MustVerifyMobile;
use Blpraveen\MobileVerification\Concerns\VerifyMobile;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements IMustVerifyMobile
{
    use Notifiable, VerifyMobile;

    // ...
}
```

	
