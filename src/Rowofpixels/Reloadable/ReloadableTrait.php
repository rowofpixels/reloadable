<?php
namespace Rowofpixels\Reloadable;

trait ReloadableTrait
{
    public function reload()
    {
        $reloaded = new static;
        $reloaded = $reloaded->find($this->{$this->primaryKey});

        $this->attributes = $reloaded->attributes;
        $this->original = $reloaded->original;

        return $this;
    }
}
