<?php

namespace Arungpisyadi\Xoeshee\Facades;

use Illuminate\Support\Facades\Facade;

class Xoeshee extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'xoeshee';
    }
}
