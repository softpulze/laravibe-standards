<?php

declare(strict_types=1);

namespace SoftPulze\LaravibeStandards\Tests\Fixtures;

use SoftPulze\LaravibeStandards\Enums\Concerns\HasEnumMetadata;

enum ToastType: int
{
    use HasEnumMetadata;

    case Error = 1;
    case Success = 2;
    case Warning = 3;
    case Info = 4;
}
