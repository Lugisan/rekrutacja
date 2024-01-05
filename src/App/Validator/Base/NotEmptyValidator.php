<?php

declare(strict_types=1);

namespace App\Validator\Base;

use App\Exception\Validator\InvalidArgumentException;

class NotEmptyValidator extends AbstractValidator
{
    public function valid(): void
    {
        if (
            $this->value === null
            || $this->value === ''
        ) {
            throw new InvalidArgumentException('Field cannot be left blank');
        }
    }
}
