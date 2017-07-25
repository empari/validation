Empari/Validation
=================
The Empari Validation package.

## Installation

### Composer

Execute the following command to get the latest version of the package:

```terminal
composer require empari/validation
```

### Laravel

In your `config/app.php` add `Empari\Validation\ValidationServiceProvider::class` to the end of the `providers` array:

```php
'providers' => [
    ...
    Empari\Validation\ValidationServiceProvider::class,
],
```

Run commands for validation:
```php
echo app('validation.cnpj')->validate('66.204.558/0001-05');
echo app('validation.cpf')->validate('628.786.185-13');
echo app('validation.cnpjcpf')->validate('62878618513');
echo app('validation.credit_card')->validate('5502232564641117');
echo app('validation.insc_estadual')->validate('pr', '70.103.83.63-8');
```

