<?php

namespace Arungpisyadi\Xoeshee\Facades;

use Illuminate\Support\Facades\Facade;

class UserBaker extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'UserBaker';
    }
}