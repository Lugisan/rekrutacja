<?php

declare(strict_types=1);

namespace App\Validator\Base;

use App\Exception\Validator\Base\InvalidArgumentException;

trait NotEmptyValidator
{
    /**
     * @throws InvalidArgumentException
     */
    public function validateNotEmpty(
        ?string $value
    ): void {
        if ($value === null || $value === '') {
            throw new InvalidArgumentException('Field cannot be left blank');
        }
    }
}
