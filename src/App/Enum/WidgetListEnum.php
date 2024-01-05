<?php

declare(strict_types=1);

namespace App\Enum;

enum WidgetListEnum: string
{
    case VISIT_DESCRIPTION = 'visit-description';
    case VISIT_ICD9 = 'visit-icd9';
    case VISIT_ICD10 = 'visit-icd10';
    case E_PRESCRIPTION = 'e-prescription';
    case E_REFERRALS = 'referrals';
    case E_ZLA = 'e-zla';
    case EXTERNAL_DOCUMENTATION = 'external-documentation';
    case VISIT_RECOMMENDATION = 'visit-recommendation';
    case VISIT_FILES = 'visit-files';

    public static function getList(): array
    {
        return [
            self::VISIT_DESCRIPTION->value,
            self::VISIT_ICD9->value,
            self::VISIT_ICD10->value,
            self::E_PRESCRIPTION->value,
            self::E_REFERRALS->value,
            self::E_ZLA->value,
            self::EXTERNAL_DOCUMENTATION->value,
            self::VISIT_RECOMMENDATION->value,
            self::VISIT_FILES->value,
        ];
    }
}
