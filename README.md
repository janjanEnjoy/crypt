# crypt for Laravel 5.* or Lumen

## Installing
```shell script
composer require janjanenjoy/crypt
```
### Laravel
register the provider to your project
```php
//config/app.php


'providers' => [
        //...
        JanjanEnjoy\Crypt\CryptServiceProvider::class,    //This is default in laravel 5.5
    ],

/**if you want to use Facade mode ,you can add your own alias configuration like below.**/
'aliases' => [
        //...
        'MyCrypt' => \JanjanEnjoy\Crypt\CryptService::class,
]
```
and publish the config file to your project or copy the file from vendor by manual operation.
```shell script
php artisan vendor:publish --provider=JanjanEnjoy\\Crypt\\CryptServiceProvider
```

### lumen
register the provider to your project
```php
//bootstrap/app.php

$app->register( JanjanEnjoy\Crypt\CryptServiceProvider::class);
```
copy the config file from vendor to your root config direction  by manual operation

## Configuration
```php

    /**
     * 本项目的app_secret
     */
    'app_secret' =>env('XTHK_APP_SECRET','12345678912345678912345678912312'),

    /**
     * 加密规则,支持AES-128-CBC，AES-256-CBC
     */
    'cipher' => env('XTHK_CIPHER','AES-256-CBC'),
```

## Usage
```php
$data = ['test'=>123];
$sign = MingCrypt::sign($data);   //签名
print_r($sign);
$check = MingCrypt::signCheck($data,$sign);   //验签
print_r($check);

```



    



