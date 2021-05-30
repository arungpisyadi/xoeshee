<?php

namespace Arungpisyadi\Xoeshee\Facades;

use Illuminate\Support\Facades\Facade;

class CartBaker extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'CartBaker';
    }
}