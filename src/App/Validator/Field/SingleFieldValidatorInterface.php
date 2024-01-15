<?php

declare(strict_types=1);

namespace App\Validator\Field;

use App\Exception\Validator\Base\InvalidArgumentException;

interface SingleFieldValidatorInterface extends FieldValidatorInterface
{
    /**
     * @throws InvalidArgumentException
     */
    public function valid(?string $value): void;
}
