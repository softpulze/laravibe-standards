<?php

declare(strict_types=1);

namespace SoftPulze\LaravibeStandards\Tests\Fixtures;

enum UserRole
{
    case Admin;
    case Editor;
    case Viewer;
}
