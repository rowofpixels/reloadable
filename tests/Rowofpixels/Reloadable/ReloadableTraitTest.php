<?php
namespace Rowofpixels\Reloadable;

use Illuminate\Database\Eloquent\Model as Eloquent;

class ReloadableModel extends Eloquent
{
    use ReloadableTrait;

    protected $fillable = array('title');
}

class ReloadableModelWithAlternativePrimaryKey extends Eloquent
{
    use ReloadableTrait;

    protected $primaryKey = 'alternative_id';
    protected $fillable = array('title');
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

        $this->assertSame(1, ReloadableModel::count());
    }

    public function testReloadableModelReloads()
    {
        $modelA = ReloadableModel::create(array('title' => 'Original Title'));
        $modelB = ReloadableModel::first();
        $modelB->title = 'New Title';
        $modelB->save();

        $modelA->reload();

        $this->assertEquals('New Title', $modelA->title);
    }

    public function testReloadableModelReloadIsChainable()
    {
        $modelA = ReloadableModel::create(array('title' => 'Original Title'));
        $modelB = ReloadableModel::first();
        $modelB->title = 'New Title';
        $modelB->save();

        $this->assertEquals('New Title', $modelA->reload()->title);
    }

    public function testReloadableModelWorksWithAlternativePrimaryKey()
    {
        $modelA = ReloadableModelWithAlternativePrimaryKey::create(array('title' => 'Original Title'));
        $modelB = ReloadableModelWithAlternativePrimaryKey::first();
        $modelB->title = 'New Title';
        $modelB->save();

        $modelA->reload();

        $this->assertEquals('New Title', $modelA->title);
    }

    public function testReloadableModelReloadIsNotDirty()
    {
        $modelA = ReloadableModel::create(array('title' => 'Original Title'));
        $modelB = ReloadableModel::first();
        $modelB->title = 'New Title';
        $modelB->save();

        $modelA->reload();

        $this->assertFalse($modelA->isDirty());
    }
}
