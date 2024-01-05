<?php

declare(strict_types=1);

namespace App\Validator\Base;

use App\Exception\Validator\InvalidArgumentException;

final class UuidValidator extends AbstractValidator
{
    public function valid(): void
    {
        if(!preg_match('/^\w{8}-\w{4}-\w{4}-\w{4}-\w{12}$/', $this->value)) {
            throw new InvalidArgumentException('Field is not a valid UUID4!');
        }
    }

}
