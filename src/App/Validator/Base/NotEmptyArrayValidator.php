<?php

declare(strict_types=1);

namespace App\Validator\Base;

use App\Exception\Validator\Base\InvalidArgumentException;

trait NotEmptyArrayValidator
{
    public function validateNotEmptyArray(
        ?array $values
    ): void {
        if (
            null === $values
            || count($values) <= 0
        ) {
            throw new InvalidArgumentException('Field cannot be left blank');
        }
    }
}
