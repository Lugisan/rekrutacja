<?php

declare(strict_types=1);

namespace App\Enum;

enum ImportFileNamesEnum: string
{
    case EVENT_TYPES_XML = 'eventType.xml';
    case EVENT_TYPES_TEXT = 'preparedEventType.txt';

    case USERS_XML = 'users.xml';
    case USERS_TEXT = 'preparedUsers.txt';
}
