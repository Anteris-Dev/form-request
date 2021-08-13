<?php

namespace Anteris\Tests\FormRequest\Attributes;

use Anteris\FormRequest\Attributes\DigitsBetween;
use Anteris\Tests\FormRequest\Support\TestsValidationAttributes;
use PHPUnit\Framework\TestCase;

class DigitsBetweenTest extends TestCase
{
    use TestsValidationAttributes;

    public function test_it_is_a_validation_attribute()
    {
        $this->assertValidationAttribute(DigitsBetween::class);
    }

    public function test_it_returns_correct_rules()
    {
        $digits = new DigitsBetween(1, 5);
        $digits2 = new DigitsBetween(1, 30);

        $this->assertValidationRules(['digits_between:1,5'], $digits);
        $this->assertValidationRules(['digits_between:1,30'], $digits2);
    }
}