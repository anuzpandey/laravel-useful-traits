<?php

declare(strict_types=1);

namespace AnuzPandey\LaravelUsefulTraits\Concerns;

trait SetPageTitle
{
    protected function setPageTitle($pageTitle, $pageSubTitle = null): void
    {
        view()->share(['pageTitle' => $pageTitle, 'pageSubTitle' => $pageSubTitle]);
    }
}
