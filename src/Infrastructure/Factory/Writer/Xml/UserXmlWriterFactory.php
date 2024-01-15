<?php

declare(strict_types=1);

namespace Infrastructure\Factory\Writer\Xml;

use App\Converter\ArrayToXmlConverterInterface;
use App\Writer\Xml\UserXmlWriter;

final class UserXmlWriterFactory
{
    public static function createService(
        ArrayToXmlConverterInterface $arrayToXmlConverter
    ): UserXmlWriter {
        return new UserXmlWriter($arrayToXmlConverter);
    }
}
