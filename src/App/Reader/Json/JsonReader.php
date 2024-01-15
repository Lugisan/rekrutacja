<?php

declare(strict_types=1);

namespace App\Reader\Json;

final class JsonReader implements JsonReaderInterface
{
    public function getData(
        string $filePath
    ): array {
        return json_decode(
            file_get_contents(
                $filePath
            ),
            true
        );
    }
}
