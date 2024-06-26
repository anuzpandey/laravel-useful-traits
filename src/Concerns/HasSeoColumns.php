<?php

declare(strict_types=1);

namespace AnuzPandey\LaravelUsefulTraits\Concerns;

trait HasSeoColumns
{
    public function initializeHasSeoColumns(): void
    {
        $this->fillable[] = 'seo_title';
        $this->fillable[] = 'seo_description';
        $this->fillable[] = 'seo_keywords';
    }
}
