<?php
namespace Empari\Validation;

use Empari\Validation\Rules\CnpjCpfValidation;
use Empari\Validation\Rules\CnpjValidation;
use Empari\Validation\Rules\CpfValidation;
use Empari\Validation\Rules\CreditCardValidation;
use Empari\Validation\Rules\InscEstadualValidation;
use Illuminate\Support\ServiceProvider;

class ValidationServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerValidationCnpj();
        $this->registerValidationCpf();
        $this->registerValidationCnpjCpf();
        $this->registerValidationCreditCard();
        $this->registerValidationInscEstadual();
    }

    /**
     * Register the cnpj verifier.
     *
     * @return void
     */
    protected function registerValidationCnpj()
    {
        $this->app->singleton('validation.cnpj', function () {
            return new CnpjValidation();
        });
    }

    /**
     * Register the cpf verifier.
     *
     * @return void
     */
    protected function registerValidationCpf()
    {
        $this->app->singleton('validation.cpf', function () {
            return new CpfValidation();
        });
    }

    /**
     * Register the cnpj or cpf verifier.
     *
     * @return void
     */
    protected function registerValidationCnpjCpf()
    {
        $this->app->singleton('validation.cnpjcpf', function () {
            return new CnpjCpfValidation();
        });
    }

    /**
     * Register the Credit Card verifier.
     *
     * @return void
     */
    protected function registerValidationCreditCard()
    {
        $this->app->singleton('validation.credit_card', function () {
            return new CreditCardValidation();
        });
    }

    /**
     * Register the Insc Estadual verifier.
     *
     * @return void
     */
    protected function registerValidationInscEstadual()
    {
        $this->app->singleton('validation.insc_estadual', function () {
            return new InscEstadualValidation();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'validation.cnpj',
            'validation.cpf',
            'validation.cnpjcpf',
            'validation.credit_card',
            'validation.insc_estadual',
        ];
    }
}