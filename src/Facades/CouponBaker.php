<?php

namespace Arungpisyadi\Xoeshee\Facades;

use Illuminate\Support\Facades\Facade;

class CouponBaker extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'CouponBaker';
    }
}