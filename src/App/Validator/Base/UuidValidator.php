<?php

declare(strict_types=1);

namespace App\Validator\Base;

use App\Exception\Validator\InvalidArgumentException;

trait UuidValidator
{
    /**
     * @throws InvalidArgumentException
     */
    public function validateUuid(
        string $value
    ): void {
        if (!preg_match('/^\w{8}-\w{4}-\w{4}-\w{4}-\w{12}$/', $value)) {
            throw new InvalidArgumentException('Field is not valid UUID4');
        }
    }
}
