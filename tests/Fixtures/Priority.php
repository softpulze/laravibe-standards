<?php

declare(strict_types=1);

namespace SoftPulze\LaravibeStandards\Tests\Fixtures;

use SoftPulze\LaravibeStandards\Enums\Concerns\HasEnumMetadata;

enum Priority
{
    use HasEnumMetadata;

    case Low;
    case Medium;
    case High;
}
