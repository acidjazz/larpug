[![](media/pug128.png)](/pugjs/pug)
![](media/and128.png)
[![](media/laravel128.png)](/http://laravel.com)
![](media/plus128.png)
[![](media/lumen128.png)](/http://lumen.laravel.com)

Allows you to use native [Pug](/pugjs/pug) seamlessly in [Laravel 5](http://laravel.com) and [Lumen](http://lumen.laravel.com)

[![Total Downloads](https://poser.pugx.org/acidjazz/larpug/downloads)](https://packagist.org/packages/acidjazz/larpug)
[![Latest Stable Version](https://poser.pugx.org/acidjazz/larpug/v/stable)](https://packagist.org/packages/acidjazz/larpug)
[![Latest Unstable Version](https://poser.pugx.org/acidjazz/larpug/v/unstable)](https://packagist.org/packages/acidjazz/larpug)
[![License](https://poser.pugx.org/acidjazz/larpug/license)](https://packagist.org/packages/acidjazz/larpug)
[![Join the chat at https://gitter.im/acidjazz/larpug](https://badges.gitter.im/Join%20Chat.svg)](https://gitter.im/acidjazz/larpug?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)

> *Note*: currenty in early development

# Requirements

* [NodeJS v6.x](https://nodejs.org/en/)
* [npm v3.x](https://www.npmjs.com/)


# Installation

Require this package with Composer

```bash
composer require acidjazz/larpug
```

Install the needed node modules to run pug
```bash
npm i --prefix vendor/acidjazz/larpug/node/
```

## Laravel

Once Composer has installed or updated your packages you need to register larpug with Laravel itself. Open up config/app.php and find the providers key, towards the end of the file, and add 'larpug\LarpugServiceProvider', to the end:

```php
'providers' => [
  ...
    larpug\LarpugServiceProvider::class,
],
```
## Lumen

For usage with [Lumen](http://lumen.laravel.com), add the service provider in `bootstrap/app.php`. 

```php
$app->register(larpug\LarpugServiceProvider::class);
```
