<?php

declare(strict_types=1);

namespace SoftPulze\LaravibeStandards\Tests\Fixtures;

use DateTimeImmutable;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use SoftPulze\LaravibeStandards\DTOs\Concerns\AsDTO;

/**
 * @implements Arrayable<string, mixed>
 */
final readonly class ContactDTO implements Arrayable, Jsonable
{
    use AsDTO;

    public function __construct(
        public string $email,
        public DateTimeImmutable $registeredAt,
        public AccountStatus $status,
        public UserRole $role,
        public UserProfileDTO $profile,
    ) {}
}
