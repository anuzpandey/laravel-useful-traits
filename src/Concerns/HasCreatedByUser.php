<?php

declare(strict_types=1);

namespace AnuzPandey\LaravelUsefulTraits\Concerns;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait HasCreatedByUser
{
    public function initializeHasCreatedByUser(): void
    {
        $this->fillable[] = 'created_by';
        $this->casts += ['created_by' => 'integer'];
    }

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
