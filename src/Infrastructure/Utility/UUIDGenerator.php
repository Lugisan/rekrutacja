<?php

declare(strict_types=1);

namespace Infrastructure\Utility;

use App\Utility\UUIDGeneratorInterface;
use Ramsey\Uuid\Uuid;

final class UUIDGenerator implements UUIDGeneratorInterface
{
    public function generateUUID4(): string
    {
        return Uuid::uuid4()->toString();
    }

    public function generateUUID4FromString(
        string $value
    ): string {
        $shaName = sha1($value);

        $shortSha = substr($shaName,-32);

        return substr($shortSha, 0,8) . '-'.
            substr($shortSha, 8,4).'-'.
            substr($shortSha, 12,4). '-'.
            substr($shortSha, 16,4).'-'.
            substr($shortSha, -12);
    }
}
