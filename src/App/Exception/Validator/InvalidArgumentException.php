<?php

declare(strict_types=1);

namespace App\Exception\Validator;

use Exception;

class InvalidArgumentException extends Exception
{
    public function __construct(
        string $message,
        int $code = 400,
    ) {
        parent::__construct($message, $code);
    }
}
