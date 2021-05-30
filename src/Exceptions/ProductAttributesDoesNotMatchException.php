<?php

namespace Arungpisyadi\Xoeshee\Exceptions;

use Exception;

class ProductAttributesDoesNotMatchException extends Exception
{
    protected $message = 'Product Attributes do not match the passed attributes';
}
