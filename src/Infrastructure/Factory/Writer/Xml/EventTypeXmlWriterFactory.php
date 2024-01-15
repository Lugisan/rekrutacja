<?php

declare(strict_types=1);

namespace Infrastructure\Factory\Writer\Xml;

use App\Converter\ArrayToXmlConverterInterface;
use App\Writer\Xml\EventTypeXmlWriter;

final class EventTypeXmlWriterFactory
{
    public static function createService(
        ArrayToXmlConverterInterface $arrayToXmlConverter
    ): EventTypeXmlWriter {
        return new EventTypeXmlWriter($arrayToXmlConverter);
    }
}
