<?php

namespace Arungpisyadi\Xoeshee\Exceptions;

use Exception;

class InsufficientProductQuantity extends Exception
{
    protected $message = 'Insufficient Quantity For the applied product.';
}
