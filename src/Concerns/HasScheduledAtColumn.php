<?php

declare(strict_types=1);

namespace AnuzPandey\LaravelUsefulTraits\Concerns;

use Illuminate\Database\Eloquent\Builder;

trait HasScheduledAtColumn
{
    public function initializeHasScheduledAtColumn(): void
    {
        $this->fillable[] = 'scheduled_at';
        $this->casts += ['scheduled_at' => 'datetime'];
    }

    public function scopeScheduled(Builder $query): Builder
    {
        return $query->whereNull('scheduled_at');
    }
}
