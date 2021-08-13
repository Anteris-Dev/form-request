<?php

namespace Anteris\Tests\FormRequest\Attributes;

use Anteris\FormRequest\Attributes\EndsWith;
use Anteris\Tests\FormRequest\Support\TestsValidationAttributes;
use PHPUnit\Framework\TestCase;

class EndsWithTest extends TestCase
{
    use TestsValidationAttributes;

    public function test_it_is_a_validation_attribute()
    {
        $this->assertValidationAttribute(EndsWith::class);
    }

    public function test_it_returns_correct_rules()
    {
        $endsWith  = new EndsWith('ing');
        $endsWith2 = new EndsWith('q');

        $this->assertValidationRules(['ends_with:ing'], $endsWith);
        $this->assertValidationRules(['ends_with:q'], $endsWith2);
    }
}
