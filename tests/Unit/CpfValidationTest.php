<?php
namespace Empari\Tests\Unit;

use Empari\Validation\Rules\CpfValidation;

class CpfValidationTest extends \PHPUnit_Framework_TestCase
{
    protected $validator;

    public function __construct()
    {
        $this->validator = new CpfValidation();
    }

    public function testCpfValidationIsTrue()
    {
        $cpf_valid = '62878618513';
        $this->assertTrue($this->validator->validate($cpf_valid));
    }

    public function testCpfValidationIsFalse()
    {
        $cpf_invalid = '62878618510';
        $this->assertFalse($this->validator->validate($cpf_invalid));
    }
}