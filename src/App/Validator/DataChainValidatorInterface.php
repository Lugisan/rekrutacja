<?php

declare(strict_types=1);

namespace App\Validator;

use App\Exception\Validator\DataChainValidatorException;

interface DataChainValidatorInterface
{
    /**
     * @throws DataChainValidatorException
     */
    public function valid(array $data): void;
}
