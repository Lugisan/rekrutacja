<?php

declare(strict_types=1);

namespace App\Validator\Field;

use App\Exception\Validator\InvalidArgumentException;

interface FieldValidatorInterface
{
    /**
     * @throws InvalidArgumentException
     */
    public function valid(?string $value): void;

    public function getFieldName(): string;
}
