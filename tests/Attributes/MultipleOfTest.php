<?php

namespace Anteris\Tests\FormRequest\Attributes;

use Anteris\FormRequest\Attributes\MultipleOf;
use Anteris\Tests\FormRequest\Support\TestsValidationAttributes;
use PHPUnit\Framework\TestCase;

class MultipleOfTest extends TestCase
{
    use TestsValidationAttributes;

    public function test_it_is_a_validation_attribute()
    {
        $this->assertValidationAttribute(MultipleOf::class);
    }

    public function test_it_returns_correct_rules()
    {
        $multipleOf = new MultipleOf(2);

        $this->assertSame(['multiple_of:2'], $multipleOf->getRules());
    }
}
