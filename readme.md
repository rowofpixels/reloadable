# Reloadable

[![Build Status](https://api.travis-ci.org/rowofpixels/reloadable.svg?branch=master)](https://travis-ci.org/rowofpixels/reloadable)
&nbsp;
[![Latest Stable Version](https://poser.pugx.org/rowofpixels/reloadable/version.svg)](https://packagist.org/packages/rowofpixels/reloadable)
&nbsp;
[![License](https://poser.pugx.org/rowofpixels/reloadable/license.svg)](https://packagist.org/packages/rowofpixels/reloadable)

### Summary
Reloadable is a simple package for allowing [Eloquent](http://laravel.com/docs/eloquent) models to reload themselves, similar to Rails [ActiveRecord#reload](http://api.rubyonrails.org/classes/ActiveRecord/Persistence.html#method-i-reload).

### Installation
Install this package through [Composer](https://getcomposer.org/)
```json
{
    "require": {
        "rowofpixels/reloadable": "0.1.*"
    }
}
```

### Usage
Use `Rowofpixels\Reloadable\ReloadableTrait` in an eloquent model.

```php
<?php
namespace Acme\Models;

use Rowofpixels\Reloadable\ReloadableTrait;

class Animal
{
    use ReloadableTrait;
}

...

$animal = new \Acme\Models\Animal();
$animal->reload(); // Reloads model from the database
```
