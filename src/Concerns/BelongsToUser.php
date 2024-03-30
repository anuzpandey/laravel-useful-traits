<?php

declare(strict_types=1);

namespace AnuzPandey\LaravelUsefulTraits\Concerns;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait BelongsToUser
{
    public function initializeBelongsToUser(): void
    {
        $this->fillable[] = 'user_id';
        $this->casts += ['user_id' => 'integer'];
        $this->with += ['user'];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
