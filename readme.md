# Reloadable

Reloadable is a simple package for allowing [Eloquent](http://laravel.com/docs/eloquent) models to reload themselves, similar to Rails [ActiveRecord#reload](http://api.rubyonrails.org/classes/ActiveRecord/Persistence.html#method-i-reload).

### Installation
Install this package through [Composer](https://getcomposer.org/)

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
