<?php

namespace Arungpisyadi\Xoeshee\Exceptions;

use Exception;

class ColumnNotFoundException extends Exception
{
    protected $message = 'Column Does not exist in the table.';
}