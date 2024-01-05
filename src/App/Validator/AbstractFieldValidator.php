<?php

declare(strict_types=1);

namespace App\Validator;

use App\Exception\Validator\InvalidArgumentException;
use App\Validator\Base\AbstractValidator;

abstract class AbstractFieldValidator
{
    private array $errorMessages;

    public function __construct(
        protected string $value
    ) {
    }

    abstract protected function getValidators(): array;

    public function valid(): bool
    {
        $isValid = true;
        foreach ($this->getValidators() as $validator) {
            /** @var AbstractValidator $validator */
            try {
                $validator->valid();
            } catch (InvalidArgumentException $exception) {
                $isValid = false;
                $this->errorMessages[] = $exception->getMessage();
            }
        }

        return $isValid;
    }

    public function getErrorMessages(): array
    {
        return $this->errorMessages;
    }
}
