<?php

declare(strict_types=1);

namespace SoftPulze\LaravibeStandards\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Override;
use SoftPulze\LaravibeStandards\Resources\Concerns\FlexibleJsonResource;

abstract class AppResource extends JsonResource
{
    use FlexibleJsonResource;

    /**
     * Resolve the resource to a plain array for Inertia props.
     *
     * @return array<int|string, mixed>
     */
    final public function toInertia(): array
    {
        return $this->resolve();
    }

    /**
     * Create a new resource collection instance.
     */
    #[Override]
    protected static function newCollection(mixed $resource): AppResourceCollection
    {
        return new AppResourceCollection($resource, static::class);
    }
}
