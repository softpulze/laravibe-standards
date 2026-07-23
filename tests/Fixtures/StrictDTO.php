<?php

declare(strict_types=1);

namespace SoftPulze\LaravibeStandards\Tests\Fixtures;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use SoftPulze\LaravibeStandards\DTOs\Concerns\AsDTO;

/**
 * @implements Arrayable<string, mixed>
 */
final readonly class StrictDTO implements Arrayable, Jsonable
{
    use AsDTO;

    public function __construct(
        public string $name,
        public int $value,
    ) {}

    protected static function shouldThrowOnUnknownKeys(): bool
    {
        return true;
    }
}
