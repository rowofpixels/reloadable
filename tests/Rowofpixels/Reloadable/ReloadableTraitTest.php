<?php
namespace Rowofpixels\Reloadable;

use Illuminate\Database\Eloquent\Model as Eloquent;

class ReloadableModel extends Eloquent
{
    use ReloadableTrait;
}

class ReloadableTraitTest extends TestCase
{
    public function testReloadableModelCanBeInstantiated()
    {
        new ReloadableModel();
    }

    public function testReloadableModelCanBeSaved()
    {
        $model = new ReloadableModel();
        $model->save();
    }
}
