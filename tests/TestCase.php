<?php

declare(strict_types=1);

namespace SoftPulze\LaravibeStandards\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use SoftPulze\LaravibeStandards\LaravibeStandardsServiceProvider;

abstract class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [
            LaravibeStandardsServiceProvider::class,
        ];
    }
}
