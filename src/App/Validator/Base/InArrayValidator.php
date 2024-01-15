<?php

declare(strict_types=1);

namespace App\Validator\Base;


use App\Exception\Validator\Base\InvalidArgumentException;

trait InArrayValidator
{
    abstract protected function getInArrayOptions(): array;

    /**
     * @throws InvalidArgumentException
     */
    public function validateInArray(
        ?string $value
    ): void {
        if (!in_array($value, $this->getInArrayOptions())) {
            throw new InvalidArgumentException(
                sprintf(
                    'Field must be one of the available values: %s',
                    implode(', ', $this->getInArrayOptions())
                )
            );
        }
    }
}
