<?php

declare(strict_types=1);

namespace App\Exception\Validator;

use Exception;

class DataChainValidatorException extends Exception
{
    public function __construct(
        protected array $errorMessages,
        int $code = 400
    ) {
        parent::__construct(
            implode('', array_map(
                static function ($v, $k) {
                    return $k . ': ' . $v . "\n";
                },
                $errorMessages,
                array_keys($errorMessages)
            )),
            $code
        );
    }

    public function getErrorMessages(): array
    {
        return $this->errorMessages;
    }
}
