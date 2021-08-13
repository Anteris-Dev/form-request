<?php

namespace Anteris\Tests\FormRequest\Attributes;

use Anteris\FormRequest\Attributes\AlphaNumeric;
use Anteris\Tests\FormRequest\Support\TestsValidationAttributes;
use PHPUnit\Framework\TestCase;

class AlphaNumericTest extends TestCase
{
    use TestsValidationAttributes;

    public function test_it_is_a_validation_attribute()
    {
        $this->assertValidationAttribute(AlphaNumeric::class);
    }

    public function test_it_returns_correct_rules()
    {
        $this->assertValidationRules(['alpha_num'], new AlphaNumeric());
    }
}