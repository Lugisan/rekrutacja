<?php

declare(strict_types=1);

namespace App\Validator;

use App\Validator\Base\NotEmptyValidator;
use App\Validator\Base\UuidValidator;

final class UuidFieldValidator extends AbstractFieldValidator
{
    protected function getValidators(): array
    {
        return [
            new NotEmptyValidator($this->value),
            new UuidValidator($this->value)
        ];
    }
}
