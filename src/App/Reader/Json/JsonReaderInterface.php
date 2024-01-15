<?php

declare(strict_types=1);

namespace App\Reader\Json;

interface JsonReaderInterface
{
    public function getData(string $filePath): array;
}
