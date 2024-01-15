<?php

declare(strict_types=1);

namespace App\Validator\Field\EventType;

use App\Enum\Field\EventType\WidgetListEnum;
use App\Validator\Base\MultiInArrayValidator;
use App\Validator\Base\NotEmptyArrayValidator;
use App\Validator\Field\ArrayFieldValidatorInterface;

final class WidgetListFiledValidator implements ArrayFieldValidatorInterface
{
    use NotEmptyArrayValidator;
    use MultiInArrayValidator;

    public function valid(?array $values): void
    {
        $this->validateNotEmptyArray($values);
        $this->validateMultiInArray($values);
    }

    public function getFieldName(): string
    {
        return 'widgetList';
    }

    protected function getInArrayOptions(): array
    {
        return WidgetListEnum::getList();
    }
}
