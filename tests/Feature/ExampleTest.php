<?php

declare(strict_types=1);

use LaravibeStandards\LaravibeStandards\LaravibeStandards;

it('resolves the singleton', function () {
    expect(app(LaravibeStandards::class))->toBeInstanceOf(LaravibeStandards::class);
});

it('returns the same instance from the container', function () {
    expect(app(LaravibeStandards::class))->toBe(app(LaravibeStandards::class));
});

it('merges the package config', function () {
    expect(config('laravibe-standards.placeholder'))->toBe('default');
});

it('registers the artisan command', function () {
    $this->artisan('laravibe-standards:placeholder')
        ->expectsOutputToContain('LaravibeStandards placeholder command executed.')
        ->assertSuccessful();
});
