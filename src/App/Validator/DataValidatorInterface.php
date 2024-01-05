<?php

declare(strict_types=1);

namespace App\Validator;

interface DataValidatorInterface
{
    public function isValid(array $data): bool;

    public function getErrorMessages(): array;
}
