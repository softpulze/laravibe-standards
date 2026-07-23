<?php

declare(strict_types=1);

namespace SoftPulze\LaravibeStandards\Tests\Fixtures;

use SoftPulze\LaravibeStandards\Enums\Concerns\HasEnumMetadata;

enum ToastType: string
{
    use HasEnumMetadata;

    case Error = 'error';
    case Success = 'success';
    case Warning = 'warning';
    case Info = 'info';
}
