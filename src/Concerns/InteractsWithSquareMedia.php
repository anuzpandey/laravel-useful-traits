<?php

declare(strict_types=1);

namespace AnuzPandey\LaravelUsefulTraits\Concerns;

// use Laravolt\Avatar\Facade as Avatar;
use Spatie\Image\Enums\Fit;
use Spatie\Image\Exceptions\InvalidManipulation;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

trait InteractsWithSquareMedia
{
    use InteractsWithMedia;

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('image')
            ->useFallbackUrl($this->getFallBackImagePathAndUrl())
            ->useFallbackPath(public_path($this->getFallBackImagePathAndUrl()))
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
            ->fit(Fit::Crop, 400, 400)
            ->keepOriginalImageFormat()
            ->performOnCollections('image');

        $this->addMediaConversion('thumb')
            ->fit(Fit::Crop, 200, 200)
            ->keepOriginalImageFormat()
            ->performOnCollections('image');

        $this->addMediaConversion('thumb-sm')
            ->fit(Fit::Crop, 80, 80)
            ->keepOriginalImageFormat()
            ->performOnCollections('image');

        if (method_exists($this, 'registerAdditionalMediaConversions')) {
            $this->registerAdditionalMediaConversions();
        }
    }

    public function getFirstMediaOrFallBackUrl(string $collectionName = 'image', $conversion = 'thumb', string $subject = 'title'): ?string
    {
        return ! empty($this->getFirstMediaurl($collectionName, $conversion))
            ? $this->getFirstMediaUrl($collectionName, $conversion)
            : null; // Avatar::create($this->{$subject})->setDimension('200')->toBase64();
    }

    private function getFallBackImagePathAndUrl(): string
    {
        if ( ! defined('static::FALLBACK_IMAGE_PATH')) {
            return '/common/square-placeholder.jpg';
        }

        return static::FALLBACK_IMAGE_PATH;
    }
}
