<?php

declare(strict_types=1);

namespace Import\TestMedica\Service;

use App\Service\EventType\AbstractImportUsers;

final class ImportUserServiceUsers extends AbstractImportUsers
{
    protected function import(string $inputPathDir): array
    {
        return [];
    }

}
