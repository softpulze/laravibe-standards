<?php

declare(strict_types=1);

namespace LaravibeStandards\LaravibeStandards\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \LaravibeStandards\LaravibeStandards\LaravibeStandards
 */
class LaravibeStandards extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \LaravibeStandards\LaravibeStandards\LaravibeStandards::class;
    }
}
