<?php

declare(strict_types=1);

namespace App\Validator\Field;

interface FieldValidatorInterface
{
    public function getFieldName(): string;
}
