<?php

namespace Empari\Validation\Rules;

/**
 * Class CreditCardValidation
 * Based in http://rosettacode.org/wiki/Luhn_test_of_credit_card_numbers
 * @package Empari\Validation\Rules
 */
class CreditCardValidation implements RuleValidation
{

    /**
     * Validation
     * @param $value
     * @return boolean
     */
    public function validate($value)
    {
        $str = '';
        foreach(array_reverse(str_split($value)) as $i => $c) $str .= ($i % 2 ? $c * 2 : $c );
        return array_sum( str_split($str) ) % 10 == 0;
    }
}