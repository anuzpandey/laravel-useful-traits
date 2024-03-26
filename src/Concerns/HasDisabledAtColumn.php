<?php

declare(strict_types=1);

namespace AnuzPandey\LaravelUsefulTraits\Concerns;

use Illuminate\Database\Eloquent\Builder;

trait HasDisabledAtColumn
{
    public function initializeHasDisabledAtColumn(): void
    {
        $this->fillable[] = 'disabled_at';
        $this->casts += ['disabled_at' => 'datetime'];
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->whereNull('disabled_at');
    }
}
