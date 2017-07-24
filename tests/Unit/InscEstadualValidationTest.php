<?php

namespace Empari\Tests\Unit;


use Empari\Validation\Rules\InscEstadualValidation;

class InscEstadualValidationTest extends \PHPUnit_Framework_TestCase
{
    protected $validator;

    public function __construct()
    {
        $this->validator = new InscEstadualValidation();
    }

    public function testIEisValid()
    {
        $ie_valid = '90547017-53';
        $this->assertTrue($this->validator->validate('PR', $ie_valid));
    }

    public function testIEisInValid()
    {
        $ie_valid = '90.547.017-53';
        $this->assertFalse($this->validator->validate('SC', $ie_valid));
    }
}