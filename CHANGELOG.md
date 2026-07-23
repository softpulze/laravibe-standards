# Release Notes

## [Unreleased](https://github.com/softpulze/laravibe-standards/compare/v0.1.0...1.x)

### Changed

- Raised minimum PHP to 8.4 and dropped Laravel 12 support
- Updated CI matrix to run on PHP 8.4/8.5 and Laravel 13 only

## [v0.1.0](https://github.com/softpulze/laravibe-standards/compare/...v0.1.0) - 2026-07-23

### Added

- DTO convention with `AsDTO` trait for typed, immutable data transfer objects
- `make:dto` Artisan command with package stub that is also publishable
- Stub publishing tag `laravibe-standards-stubs` for customization
- Full DTO convention guide under `src/DTOs/README.md`
- Boost skill updated with DTO adoption workflow for Laravel apps
