<?php

declare(strict_types=1);

namespace AnuzPandey\LaravelUsefulTraits\Concerns;

use Illuminate\Support\Str;

trait HasUuidAsRouteModelBinding
{
    public static function bootHasUuidAsRouteModelBinding(): void
    {
        static::creating(function ($model): void {
            $model->uuid = (string) Str::uuid();
        });
    }

    public function initializeHasUuidAsRouteModelBinding(): void
    {
        $this->fillable[] = 'uuid';
    }

    public function getRouteKeyName(): string
    {
        return 'uuid';
    }
}
