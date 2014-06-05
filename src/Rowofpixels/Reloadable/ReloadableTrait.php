<?php
namespace Rowofpixels\Reloadable;

trait ReloadableTrait
{
    public function reload()
    {
        $reloaded = new static;
        $reloaded = $reloaded->newQuery()->find($this->id);

        $this->attributes = $reloaded->attributes;

        return $this;
    }
}
