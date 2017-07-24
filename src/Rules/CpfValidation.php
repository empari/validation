<?php

namespace Empari\Validation\Rules;


class CpfValidation implements RuleValidation
{
    /**
     * Validation
     * @param $value
     * @return boolean
     */
    public function validate($value)
    {
        // Deixa o CPF com apenas números
        $value = preg_replace( '/[^0-9]/', '', $value);
        $value = (string) $value;

        $digitos = substr($value, 0, 9);
        $novoCpf = $this->calcularDigitosPosicoes($digitos);
        $novoCpf = $this->calcularDigitosPosicoes($novoCpf, 11);

        if ($this->verificarIgualdade($value)) {
            return false;
        }

        if ($novoCpf === $value) {
            return true;
        }

        return false;
    }

    private function calcularDigitosPosicoes($digitos, $posicoes = 10, $somaDigitos = 0)
    {
        for ($i = 0; $i < strlen($digitos); $i++) {
            $somaDigitos = $somaDigitos + ($digitos[$i] * $posicoes);
            $posicoes--;
            if ($posicoes < 2) {
                $posicoes = 9;
            }
        }
        $somaDigitos = $somaDigitos % 11;
        if ($somaDigitos < 2) {
            $somaDigitos = 0;
        } else {
            $somaDigitos = 11 - $somaDigitos;
        }
        $cpf = $digitos . $somaDigitos;
        return $cpf;
    }

    private function verificarIgualdade($value)
    {
        $caracteres = str_split($value);
        $todosIguais = true;
        $lastVal = $caracteres[0];
        foreach ($caracteres as $val) {
            if ($lastVal != $val) {
                $todosIguais = false;
            }
            $lastVal = $val;
        }
        return $todosIguais;
    }
}