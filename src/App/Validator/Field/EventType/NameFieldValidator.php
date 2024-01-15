<?php

declare(strict_types=1);

namespace App\Validator\Field\EventType;

use App\Validator\Base\MaxLengthValidator;
use App\Validator\Base\NotEmptyValidator;
use App\Validator\Field\SingleFieldValidatorInterface;

final class NameFieldValidator implements SingleFieldValidatorInterface
{
    use NotEmptyValidator;
    use MaxLengthValidator;

    public function valid(?string $value): void
    {
        $this->validateNotEmpty($value);
        $this->validateMaxLength($value);
    }

    public function getFieldName(): string
    {
        return 'name';
    }

    protected function getMaxLength(): int
    {
        return 100;
    }
}
