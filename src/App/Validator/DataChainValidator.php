<?php

declare(strict_types=1);

namespace App\Validator;

use App\Exception\Validator\Base\InvalidArgumentException;
use App\Exception\Validator\DataChainValidatorException;
use App\Validator\Field\FieldValidatorInterface;

class DataChainValidator implements DataChainValidatorInterface
{
    /**
     * @var FieldValidatorInterface[]
     */
    private array $fieldValidators;

    public function __construct(
        FieldValidatorInterface ...$fieldValidators
    ) {
        $this->fieldValidators = $fieldValidators;
    }

    public function valid(
        array $data
    ): void {
        $errorMessages = [];
        foreach ($this->fieldValidators as $fieldValidator) {
            try {
                $fieldValidator->valid($data[$fieldValidator->getFieldName()]);
            } catch (InvalidArgumentException $exception) {
                $errorMessages[$fieldValidator->getFieldName()] = $exception->getMessage();
            }

            unset($fieldValidator);
        }

        if (count($errorMessages) > 0) {
            throw new DataChainValidatorException($errorMessages);
        }
    }
}
