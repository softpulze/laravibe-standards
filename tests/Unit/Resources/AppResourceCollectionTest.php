<?php

declare(strict_types=1);

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use SoftPulze\LaravibeStandards\Resources\AppResource;
use SoftPulze\LaravibeStandards\Resources\AppResourceCollection;

it('resolves a plain collection to an array via toInertia', function () {
    $collection = new AppResourceCollection([['id' => 1], ['id' => 2]]);

    $result = $collection->toInertia();

    expect($result)->toBe([['id' => 1], ['id' => 2]]);
});

it('returns pagination information for a paginated collection', function () {
    $paginator = new LengthAwarePaginator(
        items: [['id' => 1], ['id' => 2]],
        total: 10,
        perPage: 2,
        currentPage: 1,
    );

    $collection = new AppResourceCollection($paginator);

    $result = $collection->toInertia();

    expect($result)->toHaveKey('data');
    expect($result)->toHaveKey('links');
    expect($result)->toHaveKey('meta');
    expect($result['meta'])->toHaveKey('current_page', 1);
    expect($result['meta'])->toHaveKey('per_page', 2);
    expect($result['meta'])->toHaveKey('total', 10);
});
