<?php

declare(strict_types=1);

namespace App\Common\Reader\Json;

interface JsonReaderInterface
{
    public function getData(string $filePath): array;
}
