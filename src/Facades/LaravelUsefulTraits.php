<?php

namespace AnuzPandey\LaravelUsefulTraits\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \AnuzPandey\LaravelUsefulTraits\LaravelUsefulTraits
 */
class LaravelUsefulTraits extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \AnuzPandey\LaravelUsefulTraits\LaravelUsefulTraits::class;
    }
}
