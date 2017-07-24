<?php

namespace Empari\Validation\Rules;

/**
 * Class CnpjCpfValidation
 * valida e formata CPF e CNPJ
 *
 * @package Empari\Validation\Rules
 */
class CnpjCpfValidation implements RuleValidation
{
    const CNPJ = 'CNPJ';
    const CPF = 'CPF';

    protected $validator;

    /**
     * Validation
     * @param $value
     * @return boolean
     */
    public function validate($value)
    {
        // Deixa apenas números no valor
        $value = preg_replace( '/[^0-9]/', '', $value );

        // Garante que o valor é uma string
        $value = (string)$value;

        // Valida CPF
        if ( $this->is_cnpj_or_cpf($value) === self::CPF ) {
            // Retorna true para cpf válido
            $this->validator = new CpfValidation();
            return $this->validator->validate($value);
        }
        // Valida CNPJ
        elseif ( $this->is_cnpj_or_cpf($value) === self::CNPJ ) {
            // Retorna true para CNPJ válido
            $this->validator = new CnpjValidation();
            return $this->validator->validate($value);
        }
        // Não retorna nada
        else {
            return false;
        }
    }

    /**
     * Verifica se é CPF ou CNPJ
     * Se for CPF tem 11 caracteres, CNPJ tem 14
     *
     * @access protected
     * @return string CPF, CNPJ ou false
     */
    protected function is_cnpj_or_cpf($value) {
        // Deixa apenas números no valor
        $value = preg_replace( '/[^0-9]/', '', $value );

        // Garante que o valor é uma string
        $value = (string)$value;

        // Verifica CPF
        if ( strlen( $value ) === 11 ) {
            return self::CPF;
        }
        // Verifica CNPJ
        elseif ( strlen( $value ) === 14 ) {
            return self::CNPJ;
        }
        // Não retorna nada
        else {
            return false;
        }
    }
}