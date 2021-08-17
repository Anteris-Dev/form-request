<?php

namespace Anteris\Tests\FormRequest\Attributes;

use Anteris\FormRequest\Attributes\ArrayType;
use Anteris\Tests\FormRequest\Support\TestsValidationAttributes;
use PHPUnit\Framework\TestCase;

class ArrayTypeTest extends TestCase
{
    use TestsValidationAttributes;

    public function test_it_is_a_validation_attribute()
    {
        $this->assertValidationAttribute(ArrayType::class);
    }

    public function test_it_returns_correct_rules()
    {
        $this->assertValidationRules(['array'], new ArrayType());
    }
}
