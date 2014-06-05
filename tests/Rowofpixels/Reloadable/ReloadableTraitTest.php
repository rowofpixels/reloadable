<?php
namespace Rowofpixels\Reloadable;

use Illuminate\Database\Eloquent\Model as Eloquent;
use PHPUnit_Framework_TestCase;

class ReloadableModel extends Eloquent
{
    use ReloadableTrait;
}

class ReloadableTraitTest extends PHPUnit_Framework_TestCase
{
    public function testReloadableModelCanBeInstantiated()
    {
        new ReloadableModel();
    }
}
