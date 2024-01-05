<?php

declare(strict_types=1);

namespace App\Validator;

use App\Exception\Validator\InvalidArgumentException;
use App\Validator\Field\FieldValidatorInterface;

final class UserDataValidator implements DataValidatorInterface
{
    /**
     * @var FieldValidatorInterface[]
     */
    private array $fieldValidators;

    private array $errorMessages = [];

    public function __construct(
        FieldValidatorInterface ... $fieldValidators
    ) {
        $this->fieldValidators = $fieldValidators;
    }

    public function isValid(array $data): bool
    {
        $isValid = true;

        foreach ($this->fieldValidators as $fieldValidator) {
            try {
                $fieldValidator->valid($data[$fieldValidator->getFieldName()]);
            } catch (InvalidArgumentException $exception) {
                $isValid = false;
                $this->errorMessages[$fieldValidator->getFieldName()] = $exception->getMessage();
            }

            unset($fieldValidator);
        }

        return $isValid;
    }

    public function getErrorMessages(): array
    {
        return $this->errorMessages;
    }
}
