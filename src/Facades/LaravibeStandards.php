<?php

declare(strict_types=1);

namespace SoftPulze\LaravibeStandards\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \SoftPulze\LaravibeStandards\LaravibeStandards
 */
class LaravibeStandards extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \SoftPulze\LaravibeStandards\LaravibeStandards::class;
    }
}
