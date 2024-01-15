<?php

declare(strict_types=1);

namespace Import\TestMedica\Service;

use App\Service\EventType\AbstractImportEventTypes;

final class ImportServiceEventTypes extends AbstractImportEventTypes
{
    private const ID = 0;
    private const NAME = 1;
    private const DURATION = 2;

    private const FILE_NAME = 'usluga.csv';

    protected function import(
        string $inputPathDir
    ): array {
        $handle = fopen(
            $inputPathDir . DIRECTORY_SEPARATOR . self::FILE_NAME,
            'r'
        );

        $rowNumber = 0;
        $eventTypes = [];

        while (($row = fgetcsv($handle, 100000, ',', '"')) !== false) {
            $eventType = [];
            if ($rowNumber === 0) {
                $rowNumber++;
                continue;
            }

            $eventType[self::EVENT_TYPE_UUID] = $this->uuidGenerator->generateUUID4FromString($row[self::ID]);
            $eventType[self::EVENT_TYPE_NAME] = $row[self::NAME];
            $eventType[self::EVENT_TYPE_DURATION] = $row[self::DURATION];

            $this->addEventType($eventType);
            $eventTypes[$row[self::ID]] = $eventType;
        }

        return $eventTypes;
    }

}
