<?php

namespace Arungpisyadi\Xoeshee\Exceptions;

use Exception;

class ProductDoesNotExist extends Exception
{
    protected $message = 'Order Does not exist for this user.';
}
