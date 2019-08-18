<?php

declare(strict_types=1);

namespace App\Domain\BlogPost\Model;

class DatetimeFormat
{
    public static function format(\DateTimeInterface $dateTime): string
    {
        return $dateTime->format('Y/m/d');
    }
}
