<?php

declare(strict_types=1);

namespace App\Validator\Field\EventType;

use App\Validator\Base\NotEmptyValidator;
use App\Validator\Base\NumberValidator;
use App\Validator\Field\SingleFieldValidatorInterface;

final class DurationFieldValidator implements SingleFieldValidatorInterface
{
    use NotEmptyValidator;
    use NumberValidator;

    public function valid(?string $value): void
    {
        $this->validateNotEmpty($value);
        $this->validateNumber($value);
    }

    public function getFieldName(): string
    {
        return 'duration';
    }
}
