<?php
namespace Empari\Tests\Unit;

use Empari\Validation\Rules\CnpjValidation;

class CnpjValidationTest extends \PHPUnit_Framework_TestCase
{
    protected $validator;

    public function __construct()
    {
        $this->validator = new CnpjValidation();
    }

    public function testCnpjValidationIsTrue()
    {
        $cnpj_valid = '66204558000105';
        $this->assertTrue($this->validator->validate($cnpj_valid));
    }

    public function testCnpjValidationIsFalse()
    {
        $cnpj_invalid = '66204558000101';
        $this->assertFalse($this->validator->validate($cnpj_invalid));
    }
}