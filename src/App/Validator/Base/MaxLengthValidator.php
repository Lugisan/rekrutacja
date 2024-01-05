<?php

declare(strict_types=1);

namespace App\Validator\Base;

use App\Exception\Validator\InvalidArgumentException;

class MaxLengthValidator extends AbstractValidator
{
    public function __construct(
        string $value,
        private int $maxLength
    ) {
        parent::__construct($value);
    }

    public function valid(): void
    {
        $length = strlen($this->value);
        if($length > $this->maxLength) {
            throw new InvalidArgumentException(
                sprintf(
                    'Field cannot be longer than %d characters!',
                    $this->maxLength
                )
            );
        }
    }
}
