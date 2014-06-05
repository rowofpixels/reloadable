<?php
namespace Rowofpixels\Reloadable;

use Illuminate\Database\Capsule\Manager as Capsule;
use PHPUnit_Framework_TestCase;

class TestCase extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        parent::setUp();
        $this->setTimezone();
        $this->setUpInMemoryDatabase();
        $this->migrate();
    }

    private function setTimezone()
    {
        date_default_timezone_set('America/Denver');
    }

    private function setUpInMemoryDatabase()
    {
        $capsule = new Capsule;

        $capsule->addConnection([
            'driver'    => 'sqlite',
            'database'  => ':memory:'
        ]);

        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }

    private function migrate()
    {
        Capsule::schema()->create('reloadable_models', function ($table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->timestamps();
        });

        Capsule::schema()->create('reloadable_model_with_alternative_primary_keys', function ($table) {
            $table->increments('alternative_id');
            $table->string('title')->nullable();
            $table->timestamps();
        });
    }
}
