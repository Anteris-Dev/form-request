<?php

namespace Anteris\Tests\FormRequest\Attributes;

use Anteris\FormRequest\Attributes\GreaterThan;
use Anteris\Tests\FormRequest\Support\TestsValidationAttributes;
use PHPUnit\Framework\TestCase;

class GreaterThanTest extends TestCase
{
    use TestsValidationAttributes;

    public function test_it_is_a_validation_attribute()
    {
        $this->assertValidationAttribute(GreaterThan::class);
    }

    public function test_it_returns_correct_rules()
    {
        $this->assertValidationRules(
            ['gt:some_field'],
            new GreaterThan('some_field')
        );

        $this->assertValidationRules(
            ['gt:some_other_field'],
            new GreaterThan('some_other_field')
        );
    }
}
