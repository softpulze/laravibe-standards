---
name: laravibe-standards-development
description: >
  Configure and apply the Laravibe Standards package in Laravel applications.
license: MIT
metadata:
  author: Ashok Barua Akas
---

# Laravibe Standards

Use this skill when a Laravel application needs to integrate the Laravibe Standards package.

## Primary Goal

- apply the `softpulze/laravibe-standards` package's public API in the smallest correct way

## Workflow

### 1. Inspect the Laravel app context

- confirm the app is a Laravel project
- inspect the target code paths where the package should be applied

### 2. Apply the DTO convention

The package provides immutable, typed DTOs with automatic hydration and serialization.

- generate a DTO: `php artisan make:dto {Name}`
- add typed `public readonly` constructor parameters for each field
- hydrate with `YourDTO::from($request)`, `YourDTO::fromArray($data)`, or `YourDTO::fromRequest($request)`
- serialize with `toArray()`, `toJson()`, `toEloquent()`, or `forEloquent($extra)`
- create an updated copy with `$dto->with(['field' => 'new value'])`
- extend the DTO with custom static constructors like `fromModel($model)` that delegate to `fromArray`

### 3. Publish stubs for customization (optional)

```bash
php artisan vendor:publish --tag="laravibe-standards-stubs"
```

This publishes `stubs/laravibe-standards/dto.stub` which you can customize. The `make:dto` command will use the published stub if present.

## Rules, References, and Templates

Read before executing:

- refer to `src/DTOs/README.md` inside the package for the full DTO convention guide

## Examples

```php
// 1. Generate the DTO
// php artisan make:dto Account/UpdateProfileDTO

// 2. Define the constructor parameters
final readonly class UpdateProfileDTO implements Arrayable, Jsonable
{
    use \SoftPulze\LaravibeStandards\DTOs\Concerns\AsDTO;

    public function __construct(
        public string $name,
        public ?string $bio = null,
    ) {
    }
}

// 3. Hydrate from a form request
$dto = UpdateProfileDTO::from($request);

// 4. Use in a controller action
public function __invoke(UpdateProfileRequest $request)
{
    $dto = UpdateProfileDTO::from($request);
    $this->service->update($dto);
    return redirect()->back();
}
```

## Anti-patterns

- do not add business logic inside DTOs; keep them focused on data transfer
- do not call `from()` with an unprepared request; validate first or rely on form request `validated()`
- do not document package internals here; keep the skill focused on adoption in Laravel apps
