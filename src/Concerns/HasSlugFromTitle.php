<?php

declare(strict_types=1);

namespace AnuzPandey\LaravelUsefulTraits\Concerns;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

trait HasSlugFromTitle
{
    use HasSlug;

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom($this->getSluggableField())
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function getSluggableField(): string|array
    {
        if (! defined('static::SLUG_FIELD')) {
            return 'title';
        }

        return static::SLUG_FIELD;
    }
}
