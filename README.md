<div align="center">
    <h1>Laravibe Standards</h1>
</div>

<p align="center">
    <a href="https://packagist.org/packages/softpulze/laravibe-standards"><img src="https://img.shields.io/packagist/v/softpulze/laravibe-standards.svg?style=flat-square" alt="Packagist"></a>
    <a href="https://packagist.org/packages/softpulze/laravibe-standards"><img src="https://img.shields.io/packagist/php-v/softpulze/laravibe-standards.svg?style=flat-square" alt="PHP from Packagist"></a>
    <a href="https://packagist.org/packages/softpulze/laravibe-standards"><img src="https://badge.laravel.cloud/badge/softpulze/laravibe-standards?style=flat" alt="Laravel versions"></a>
    <a href="https://github.com/softpulze/laravibe-standards/actions"><img alt="GitHub Workflow Status (main)" src="https://img.shields.io/github/actions/workflow/status/softpulze/laravibe-standards/tests.yml?branch=main&label=Tests&style=flat-square"></a>
    <a href="https://packagist.org/packages/softpulze/laravibe-standards"><img src="https://img.shields.io/packagist/dt/softpulze/laravibe-standards.svg?style=flat-square" alt="Total Downloads"></a>
</p>

Standard conventions, structure, and tooling for Laravel apps built the LaraVibe way.

## Installation

You can install the package via Composer:

```bash
composer require softpulze/laravibe-standards
```

You may publish all of the package's resources at once:

```bash
php artisan vendor:publish --tag="laravibe-standards"
```

Or, you may publish each resource individually:

### Publishing the Configuration File

```bash
php artisan vendor:publish --tag="laravibe-standards-config"
```

### Publishing Stubs

```bash
php artisan vendor:publish --tag="laravibe-standards-stubs"
```

## Usage

### DTOs (Data Transfer Objects)

Laravibe Standards provides a convention for defining immutable, typed DTOs with automatic hydration and serialization.

**Generate a DTO:**

```bash
php artisan make:dto UserProfileDTO
php artisan make:dto Account/UpdateProfileDTO
```

**Define a DTO:**

```php
final readonly class UserProfileDTO implements Arrayable, Jsonable
{
    use \SoftPulze\LaravibeStandards\DTOs\Concerns\AsDTO;

    public function __construct(
        public string $name,
        public ?string $bio = null,
    ) {
    }
}
```

**Hydrate and serialize:**

```php
$dto = UserProfileDTO::from($request);
$dto = UserProfileDTO::fromArray(['name' => 'Alice', 'bio' => 'Developer']);

$array = $dto->toArray();
$json  = $dto->toJson();
$data  = $dto->toEloquent();

$updated = $dto->with(['bio' => 'Senior Dev']);
```

See the [full DTO guide](src/DTOs/README.md) for conventions, type casting, and advanced usage.

### Enums

Laravibe Standards provides a shared `HasEnumMetadata` trait with label, option, and validation helpers for backed and unit enums.

**Generate an enum:**

```bash
php artisan make:enum ToastType --string
php artisan make:enum Priority
```

**Define an enum:**

```php
enum ToastType: string
{
    use \SoftPulze\LaravibeStandards\Enums\Concerns\HasEnumMetadata;

    case Error = 'error';
    case Success = 'success';
    case Warning = 'warning';
    case Info = 'info';
}
```

**Use helpers:**

```php
ToastType::options();    // [{name: 'Error', value: 'error', label: 'Error'}, ...]
ToastType::values();     // ['error', 'success', 'warning', 'info']
ToastType::isValidValue('success');  // true
ToastType::fromValueOrFail('error'); // ToastType::Error
ToastType::Error->label();           // 'Error'
```

See the [full enum guide](src/Enums/README.md) for conventions, the concern contract, and design rules.

### Resources

Laravibe Standards provides base resource classes for API and Inertia responses with reusable field helpers.

**Generate a resource:**

```bash
php artisan make:resource UserResource
php artisan make:resource UserCollection --collection
```

**Define a resource:**

```php
final class UserResource extends \SoftPulze\LaravibeStandards\Resources\AppResource
{
    public function toArray(Request $request): array
    {
        return [
            $this->id(),
            $this->attribute('name'),
            $this->attribute('email'),
            ...$this->timestamps(),
        ];
    }
}
```

**Use in controllers:**

```php
UserResource::make($user);                           // single
UserResource::collection(User::paginate());          // paginated

// Inertia
return inertia('users/Show', ['user' => UserResource::make($user)->toInertia()]);
```

See the [full resource guide](src/Resources/README.md) for helpers, conventions, and serialization rules.

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Thank you for considering contributing to Laravibe Standards! Please review our [contributing guide](.github/CONTRIBUTING.md) to get started.

## Security Vulnerabilities

Please review [our security policy](.github/SECURITY.md) on how to report security vulnerabilities.

## Credits

- [Ashok Barua Akas](https://github.com/softpulze)
- [All Contributors](../../contributors)

## License

Laravibe Standards is open-sourced software licensed under the [MIT license](LICENSE.md).
