<?php

namespace App\Core\Exceptions;

class NotFoundException extends \Exception
{
    public function __construct(string $message = null, int $code = 404)
    {
        parent::__construct($message, $code);
    }
}