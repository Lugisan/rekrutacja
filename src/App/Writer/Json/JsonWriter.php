<?php

declare(strict_types=1);

namespace App\Writer\Json;

final class JsonWriter implements JsonWriterInterface
{
    public function save(
        string $filePath,
        array $data
    ): void {
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        file_put_contents(
            $filePath,
            json_encode($data)
        );
    }
}
