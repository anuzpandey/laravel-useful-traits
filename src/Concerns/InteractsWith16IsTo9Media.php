<?php

declare(strict_types=1);

namespace AnuzPandey\LaravelUsefulTraits\Concerns;

use Spatie\Image\Enums\Fit;
use Spatie\Image\Exceptions\InvalidManipulation;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

trait InteractsWith16IsTo9Media
{
    use InteractsWithMedia;

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('image')
            ->useFallbackUrl('/empty-states/no-image-found.png', 'original')
            ->useFallbackUrl('/empty-states/no-image-found-original-thumb.png', 'original-thumb')
            ->useFallbackUrl('/empty-states/no-image-found-square-thumb.png', 'square-thumb')
            ->singleFile();

        if (method_exists($this, 'registerAdditionalMediaCollections')) {
            $this->registerAdditionalMediaCollections();
        }
    }

    /**
     * @throws InvalidManipulation
     */
    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('original')
            ->fit(Fit::Crop, 1920, 1080)
            ->keepOriginalImageFormat()
            ->performOnCollections('image');

        $this->addMediaConversion('original-thumb')
            ->fit(Fit::Crop, 960, 540)
            ->keepOriginalImageFormat()
            ->performOnCollections('image');

        $this->addMediaConversion('thumb')
            ->fit(Fit::Crop, 720, 405)
            ->keepOriginalImageFormat()
            ->performOnCollections('image');

        $this->addMediaConversion('thumb-sm')
            ->fit(Fit::Crop, 360, 202.5)
            ->keepOriginalImageFormat()
            ->performOnCollections('image');

        $this->addMediaConversion('square-thumb')
            ->fit(Fit::Crop, 100, 100)
            ->keepOriginalImageFormat()
            ->performOnCollections('image');

        if (method_exists($this, 'registerAdditionalMediaConversions')) {
            $this->registerAdditionalMediaConversions();
        }
    }
}
