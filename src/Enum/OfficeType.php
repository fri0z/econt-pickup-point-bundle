<?php

declare(strict_types=1);

namespace Answear\EcontBundle\Enum;

use MabeEnum\Enum;

class OfficeType extends Enum
{
    public const OFFICE = 'office';
    public const APS = 'aps';

    public static function office(): self
    {
        return static::get(static::OFFICE);
    }

    public static function aps(): self
    {
        return static::get(static::APS);
    }
}
