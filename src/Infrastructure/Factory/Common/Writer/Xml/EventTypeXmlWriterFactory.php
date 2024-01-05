<?php

declare(strict_types=1);

namespace Infrastructure\Factory\Common\Writer\Xml;

use App\Common\Converter\ArrayToXmlConverterInterface;
use Infrastructure\Common\Writer\Xml\EventTypeXmlWriter;

final class EventTypeXmlWriterFactory
{
    public static function createService(
        ArrayToXmlConverterInterface $arrayToXmlConverter
    ): EventTypeXmlWriter {
        return new EventTypeXmlWriter($arrayToXmlConverter);
    }
}
