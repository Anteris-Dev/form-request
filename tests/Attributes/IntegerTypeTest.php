<?php

namespace Anteris\Tests\FormRequest\Attributes;

use Anteris\FormRequest\Attributes\IntegerType;
use Anteris\Tests\FormRequest\Support\TestsValidationAttributes;
use PHPUnit\Framework\TestCase;

class IntegerTypeTest extends TestCase
{
    use TestsValidationAttributes;

    public function test_it_is_a_validation_attribute()
    {
        $this->assertValidationAttribute(IntegerType::class);
    }

    public function test_it_returns_correct_rules()
    {
        $this->assertValidationRules(['integer'], new IntegerType());
    }
}
