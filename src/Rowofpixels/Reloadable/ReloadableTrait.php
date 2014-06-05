<?php
namespace Rowofpixels\Reloadable;

trait ReloadableTrait
{
    public function reload()
    {
        $reloaded = new static;
        $reloaded = $reloaded->newQuery()->find($this->{$this->primaryKey});

        $this->attributes = $reloaded->attributes;

        return $this;
    }
}
