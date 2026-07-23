<?php

declare(strict_types=1);

namespace LaravibeStandards\LaravibeStandards\Tests;

use LaravibeStandards\LaravibeStandards\LaravibeStandardsServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [
            LaravibeStandardsServiceProvider::class,
        ];
    }
}
