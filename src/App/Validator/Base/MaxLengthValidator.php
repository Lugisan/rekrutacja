<?php

declare(strict_types=1);

namespace App\Validator\Base;

use App\Exception\Validator\Base\InvalidArgumentException;

trait MaxLengthValidator
{
    abstract protected function getMaxLength(): int;

    /**
     * @throws InvalidArgumentException
     */
    public function validateMaxLength(string $value): void
    {
        $length = strlen($value);
        if($length > $this->getMaxLength()) {
            throw new InvalidArgumentException(
                sprintf(
                    'Field cannot be longer than %d characters!',
                    $this->getMaxLength()
                )
            );
        }
    }
}
