<?php

namespace Anteris\Tests\FormRequest\Attributes;

use Anteris\FormRequest\Attributes\Digits;
use Anteris\Tests\FormRequest\Support\TestsValidationAttributes;
use PHPUnit\Framework\TestCase;

class DigitsTest extends TestCase
{
    use TestsValidationAttributes;

    public function test_it_is_a_validation_attribute()
    {
        $this->assertValidationAttribute(Digits::class);
    }

    public function test_it_returns_correct_rules()
    {
        $digits = new Digits(10);
        $digits2 = new Digits(8);

        $this->assertValidationRules(['digits:10'], $digits);
        $this->assertValidationRules(['digits:8'], $digits2);
    }
}