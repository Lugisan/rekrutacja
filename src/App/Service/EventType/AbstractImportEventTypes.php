<?php

declare(strict_types=1);

namespace App\Service\EventType;

use App\Common\Writer\Json\JsonWriterInterface;
use App\Enum\ImportFileNamesEnum;
use App\Enum\WidgetListEnum;
use App\Utility\UUIDGeneratorInterface;
use Infrastructure\Common\Writer\Xml\EventTypeXmlWriter;

abstract class AbstractImportEventTypes
{
    protected const EVENT_TYPE_UUID = 'uuid';
    protected const EVENT_TYPE_NAME = 'name';
    protected const EVENT_TYPE_DURATION = 'duration';
    protected const EVENT_TYPE_WIDGET_LIST = 'widgetList';

    public function __construct(
        protected UUIDGeneratorInterface $uuidGenerator,
        private EventTypeXmlWriter $eventTypeXmlWriter,
        private JsonWriterInterface $jsonWriter
    ) {
    }

    abstract protected function import(string $inputPathDir): array;

    public function handle(
        string $inputPathDir
    ): void {
        $this->eventTypeXmlWriter
            ->setFilePath(
                sprintf(
                    '/%s/%s/%s',
                    getcwd(),
                    $inputPathDir,
                    ImportFileNamesEnum::EVENT_TYPES_XML->value
                )
            );
        $this->eventTypeXmlWriter->start();
        $this->eventTypeXmlWriter->addMultiBeginSelector();
        $eventTypes = $this->import($inputPathDir);
        $this->eventTypeXmlWriter->addMultiEndSelector();
        $this->eventTypeXmlWriter->finish();

        $this->jsonWriter
            ->save(
                sprintf(
                    '/%s/%s/%s',
                    getcwd(),
                    $inputPathDir,
                    ImportFileNamesEnum::EVENT_TYPES_TEXT->value
                ),
                $eventTypes
            );
    }

    Protected function addEventType(
        array $data
    ): void {
        $eventType[self::EVENT_TYPE_UUID] = $data[self::EVENT_TYPE_UUID];
        $eventType[self::EVENT_TYPE_NAME] = $data[self::EVENT_TYPE_NAME];
        $eventType[self::EVENT_TYPE_DURATION] = $data[self::EVENT_TYPE_DURATION];
        $eventType[self::EVENT_TYPE_WIDGET_LIST] = (empty($data[self::EVENT_TYPE_WIDGET_LIST]))
            ? $this->getDefaultWidgetList()
            : $data[self::EVENT_TYPE_WIDGET_LIST];

        $this->eventTypeXmlWriter->addSingleSelector($eventType);
    }

    protected function getDefaultEventType(): array
    {
        return [
            self::EVENT_TYPE_UUID => $this->uuidGenerator->generateUUID4(),
            self::EVENT_TYPE_NAME => 'Import - Wizyta',
            self::EVENT_TYPE_DURATION => '15',
            self::EVENT_TYPE_WIDGET_LIST => $this->getDefaultWidgetList()
        ];
    }

    protected function getDefaultWidgetList(): string
    {
        return implode(
            ',',
            WidgetListEnum::getList()
        );
    }
}
