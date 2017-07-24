<?php
namespace Empari\Validation\Rules;

/**
 * Interface Rule
 * @package Empari\Validation\Rules
 */
interface RuleValidation
{
    /**
     * Validation
     * @param $value
     * @return boolean
     */
    public function validate($value);
}