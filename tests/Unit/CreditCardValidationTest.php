<?php

namespace Empari\Tests\Unit;

use Empari\Validation\Rules\CreditCardValidation;

class CreditCardValidationTest extends \PHPUnit_Framework_TestCase
{
    protected $validator;

    public function __construct()
    {
        $this->validator = new CreditCardValidation();
    }

    public function testCreditCardNumberIsValid()
    {
        $credit_card_number = '5502232564641117'; //generated by http://www.4devs.com.br/gerador_de_numero_cartao_credito
        $this->assertTrue($this->validator->validate($credit_card_number));
    }

    public function testCreditCardNumberIsInValid()
    {
        $credit_card_invalid_number = '5502232564641110'; //generated by http://www.4devs.com.br/gerador_de_numero_cartao_credito
        $this->assertFalse($this->validator->validate($credit_card_invalid_number));
    }
}