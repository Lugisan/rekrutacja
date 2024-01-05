<?php

declare(strict_types=1);

namespace App\Common\Converter;

interface ArrayToXmlConverterInterface
{
    public function convert(array $data): string;
    public function convertUser(array $data): string;
}
