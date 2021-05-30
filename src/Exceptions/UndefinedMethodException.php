<?php

namespace Arungpisyadi\Xoeshee\Exceptions;

use Exception;

class UndefinedMethodException extends Exception
{
    protected $message = 'Call To Undefined Method';
}
