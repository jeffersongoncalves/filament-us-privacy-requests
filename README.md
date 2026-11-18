<div class="filament-hidden">

![Filament US Privacy Requests](https://raw.githubusercontent.com/jeffersongoncalves/filament-us-privacy-requests/3.x/art/jeffersongoncalves-filament-us-privacy-requests.png)

</div>

# Filament US Privacy Requests

[![Latest Version on Packagist](https://img.shields.io/packagist/v/jeffersongoncalves/filament-us-privacy-requests.svg?style=flat-square)](https://packagist.org/packages/jeffersongoncalves/filament-us-privacy-requests)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/jeffersongoncalves/filament-us-privacy-requests/tests.yml?branch=3.x&label=tests&style=flat-square)](https://github.com/jeffersongoncalves/filament-us-privacy-requests/actions?query=workflow%3Atests+branch%3A3.x)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/jeffersongoncalves/filament-us-privacy-requests/fix-php-code-style-issues.yml?branch=3.x&label=code%20style&style=flat-square)](https://github.com/jeffersongoncalves/filament-us-privacy-requests/actions?query=workflow%3A"Fix+PHP+code+styling"+branch%3A3.x)
[![Total Downloads](https://img.shields.io/packagist/dt/jeffersongoncalves/filament-us-privacy-requests.svg?style=flat-square)](https://packagist.org/packages/jeffersongoncalves/filament-us-privacy-requests)
[![License](https://img.shields.io/packagist/l/jeffersongoncalves/filament-us-privacy-requests.svg?style=flat-square)](LICENSE.md)

Consumer requests under the US state privacy laws in your Filament panel, built on [laravel-us-privacy-requests](https://github.com/jeffersongoncalves/laravel-us-privacy-requests): access, correction, deletion, portability, the list of third parties and questions about profiling, each due by the deadline of the consumer's state, and the **appeal process** every state but Utah requires.

> This plugin gives you tooling. It does not make you compliant on its own.

## Features

- Open requests with the consumer's state: the deadline follows its law (Iowa 90 days, the others 45), the strictest rules when it is unknown.
- Verify the requester, fulfil access and portability (JSON export) or deletion (deidentification), complete the manual rights, deny with the reason, extend once.
- Appeals: record the appeal, extend it where the state allows (Colorado, Oregon, Minnesota) and decide it in writing. A granted appeal reopens the request.
- Overdue requests and appeals filtered and counted in the navigation badge.
- 19 languages.

## Compatibility

| Plugin Version | Filament |
|---|---|
| [1.x](https://github.com/jeffersongoncalves/filament-us-privacy-requests/tree/1.x) | 3.x |
| [2.x](https://github.com/jeffersongoncalves/filament-us-privacy-requests/tree/2.x) | 4.x |
| [3.x](https://github.com/jeffersongoncalves/filament-us-privacy-requests/tree/3.x) | 5.x |

## Installation

```bash
composer require jeffersongoncalves/filament-us-privacy-requests:"^3.0"
```

Install and configure [laravel-us-privacy-requests](https://github.com/jeffersongoncalves/laravel-us-privacy-requests) first.

## Usage

```php
use JeffersonGoncalves\Filament\UsPrivacyRequests\UsPrivacyRequestsPlugin;

public function panel(Panel $panel): Panel
{
    return $panel
        ->plugins([
            UsPrivacyRequestsPlugin::make()
                ->subjectModels([App\Models\User::class]) // records a request can be linked to
                ->navigationGroup('Privacy')   // default: no group
                ->navigationSort(2)
                ->slug('privacy-requests'),
        ]);
}
```

All fluent methods are optional.

> The pages have no authorization of their own: register the plugin only on panels whose users may see them, or override `canAccess()` in a subclass.

## Related plugins

- [filament-us-privacy](https://github.com/jeffersongoncalves/filament-us-privacy): personal data inventory and the state law rules.
- [filament-us-privacy-opt-out](https://github.com/jeffersongoncalves/filament-us-privacy-opt-out): opt-outs, sensitive data consent and Global Privacy Control.
- [filament-us-privacy-notices](https://github.com/jeffersongoncalves/filament-us-privacy-notices): processing activities behind the privacy notice.
- [filament-us-privacy-assessments](https://github.com/jeffersongoncalves/filament-us-privacy-assessments): data protection assessments.
- [filament-us-privacy-vendors](https://github.com/jeffersongoncalves/filament-us-privacy-vendors): processors and third parties.
- [filament-us-privacy-minors](https://github.com/jeffersongoncalves/filament-us-privacy-minors): age checks, guardians and minors' consent.

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Jefferson Gonçalves](https://github.com/jeffersongoncalves)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
