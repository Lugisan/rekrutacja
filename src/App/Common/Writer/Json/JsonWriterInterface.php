<?php

declare(strict_types=1);

namespace App\Common\Writer\Json;

interface JsonWriterInterface
{
    public function save(string $filePath, array $data): void;
}
