<?php

declare(strict_types=1);

namespace App\Validator\Base;

use App\Exception\Validator\Base\InvalidArgumentException;

trait NumberValidator
{
    /**
     * @throws InvalidArgumentException
     */
    public function validateNumber(
        string $value
    ): void {
        if(
            !filter_var($value, FILTER_VALIDATE_INT)
            && !filter_var($value, FILTER_VALIDATE_FLOAT)
        ) {
            throw new InvalidArgumentException('Field is not a valid number!');
        }
    }
}
