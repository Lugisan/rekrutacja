<?php

declare(strict_types=1);

namespace App\Validator\Field;

use App\Validator\Base\NotEmptyValidator;
use App\Validator\Base\UuidValidator;

final class UuidFieldValidator implements SingleFieldValidatorInterface
{
    use NotEmptyValidator;
    use UuidValidator;

    public function valid(
        ?string $value
    ): void {
        $this->validateNotEmpty($value);
        $this->validateUuid($value);
    }

    public function getFieldName(): string
    {
        return 'uuid';
    }
}
