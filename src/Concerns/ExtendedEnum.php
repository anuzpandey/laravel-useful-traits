<?php

declare(strict_types=1);

namespace AnuzPandey\LaravelUsefulTraits\Concerns;

use Illuminate\Support\Collection;

trait ExtendedEnum
{
    public static function array(): array
    {
        return array_combine(self::names(), self::values());
    }

    public static function names(): array
    {
        return array_column(self::cases(), 'name');
    }

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function collect(): Collection
    {
        return collect(self::array());
    }
}
