<?php

declare(strict_types=1);

namespace App\Validator\Base;

use App\Exception\Validator\Base\InvalidArgumentException;

trait MultiInArrayValidator
{
    abstract protected function getInArrayOptions(): array;

    public function validateMultiInArray(
        array $values
    ): void {
        foreach ($values as $value) {
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
}
