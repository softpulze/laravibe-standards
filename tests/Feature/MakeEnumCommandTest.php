<?php

declare(strict_types=1);

use Illuminate\Support\Facades\File;

beforeEach(function () {
    File::deleteDirectory(app_path('Enums'));
    File::ensureDirectoryExists(app_path('Enums'));
    File::ensureDirectoryExists(base_path('stubs'));
});

afterEach(function () {
    File::deleteDirectory(app_path('Enums'));
    File::delete(base_path('stubs/enum.backed.stub'));
    File::delete(base_path('stubs/enum.stub'));
});

it('generates string backed enum with package stub', function () {
    File::copy(__DIR__.'/../../stubs/enum.backed.stub', base_path('stubs/enum.backed.stub'));

    $this->artisan('make:enum', ['name' => 'ToastType', '--string' => true])
        ->assertSuccessful();

    $path = app_path('Enums/ToastType.php');

    expect(File::exists($path))->toBeTrue();
    expect(File::get($path))->toContain('HasEnumMetadata');
    expect(File::get($path))->toContain('enum ToastType: string');
});

it('generates pure enum with package stub', function () {
    File::copy(__DIR__.'/../../stubs/enum.stub', base_path('stubs/enum.stub'));

    $this->artisan('make:enum', ['name' => 'Priority'])
        ->assertSuccessful();

    $path = app_path('Enums/Priority.php');

    expect(File::exists($path))->toBeTrue();
    expect(File::get($path))->toContain('HasEnumMetadata');
    expect(File::get($path))->toContain('enum Priority');
});

it('generates int backed enum with package stub', function () {
    File::copy(__DIR__.'/../../stubs/enum.backed.stub', base_path('stubs/enum.backed.stub'));

    $this->artisan('make:enum', ['name' => 'StatusCode', '--int' => true])
        ->assertSuccessful();

    $path = app_path('Enums/StatusCode.php');

    expect(File::exists($path))->toBeTrue();
    expect(File::get($path))->toContain('enum StatusCode: int');
});
