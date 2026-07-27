# Contribution Guide

Thank you for considering contributing to Laravibe Standards! Please review the following guidelines before submitting a pull request.

For significant changes, please open an issue first so we can discuss the approach.

## Process

1. Fork the project
2. Create a new branch
3. Code, test, commit, and push
4. Open a pull request detailing your changes

## Guidelines

- Ensure the coding style passes by running `composer lint`.
- Send a coherent commit history, making sure each commit in your pull request is meaningful.
- You may need to [rebase](https://git-scm.com/book/en/v2/Git-Branching-Rebasing) to avoid merge conflicts.
- Please remember that we follow [SemVer](http://semver.org/).

## Release Labels

PR labels drive auto-generated release notes via `.github/release.yml`. Apply the correct label when creating your PR:

| PR title prefix | Label |
|----------------|-------|
| `feat:` or `feat(` | `enhancement` |
| `fix:` or `fix(` | `bug` |
| `docs:` or `docs(` | `documentation` |
| `refactor:`, `chore:`, `style:`, `test:`, `ci:` | `maintenance` |
| `deps:` or dependency bumps | `dependencies` |
| Contains `!:` or `BREAKING CHANGE` | `breaking` + type label |
| Skip changelog | `skip-changelog` |

## Setup

Clone your fork, then install the dev dependencies:

```bash
composer install
```

## Lint

Lint your code:

```bash
composer lint
```

## Tests

Run all tests:

```bash
composer test
```
