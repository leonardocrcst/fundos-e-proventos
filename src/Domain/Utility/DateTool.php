<?php

namespace App\Domain\Utility;

abstract class DateTool
{
    public const string DATETIME_PATTERN = '/(\d{4})(-\d{2}){2} (\d{2}:){2}(\d{2})/';

    public static function isDateTime(string $candidate): bool
    {
        preg_match(self::DATETIME_PATTERN, $candidate, $matches);
        return isset($matches[0]);
    }
}
