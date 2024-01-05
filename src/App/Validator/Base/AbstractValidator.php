<?php

declare(strict_types=1);

namespace App\Validator\Base;

use App\Exception\Validator\InvalidArgumentException;

abstract class AbstractValidator
{
    public function __construct(
        protected string $value
    ) {
    }

    /**
     * @throws InvalidArgumentException
     */
    abstract public function valid(): void;
}
