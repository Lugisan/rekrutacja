<?php

declare(strict_types=1);

namespace Infrastructure\Factory\Common\Writer\Xml;

use App\Common\Converter\ArrayToXmlConverterInterface;
use Infrastructure\Common\Writer\Xml\UserXmlWriter;

final class UserXmlWriterFactory
{
    public static function createService(
        ArrayToXmlConverterInterface $arrayToXmlConverter
    ): UserXmlWriter {
        return new UserXmlWriter($arrayToXmlConverter);
    }
}
