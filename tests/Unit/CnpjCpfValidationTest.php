<?php

namespace Empari\Tests\Unit;

use Empari\Validation\Rules\CnpjCpfValidation;

class CnpjCpfValidationTest extends \PHPUnit_Framework_TestCase
{
    protected $validator;

    public function __construct()
    {
        $this->validator = new CnpjCpfValidation();
    }

    public function testCnpjValidationIsTrue()
    {
        $cnpj_valid = '66204558000105';
        $this->assertTrue($this->validator->validate($cnpj_valid));
    }

    public function testCpfValidationIsTrue()
    {
        $cpf_valid = '62878618513';
        $this->assertTrue($this->validator->validate($cpf_valid));
    }
}