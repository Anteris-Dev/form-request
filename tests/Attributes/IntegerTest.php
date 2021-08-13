<?php

namespace Anteris\Tests\FormRequest\Attributes;

use Anteris\FormRequest\Attributes\Integer;
use Anteris\Tests\FormRequest\Support\TestsValidationAttributes;
use PHPUnit\Framework\TestCase;

class IntegerTest extends TestCase
{
    use TestsValidationAttributes;

    public function test_it_is_a_validation_attribute()
    {
        $this->assertValidationAttribute(Integer::class);
    }

    public function test_it_returns_correct_rules()
    {
        $this->assertValidationRules(['integer'], new Integer());
    }
}