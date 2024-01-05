<?php

declare(strict_types=1);

namespace App\Utility;

interface UUIDGeneratorInterface
{
    public function generateUUID4(): string;
    public function generateUUID4FromString(string $value): string;
}
