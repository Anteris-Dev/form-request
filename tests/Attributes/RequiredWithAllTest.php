<?php

namespace Anteris\Tests\FormRequest\Attributes;

use Anteris\FormRequest\Attributes\RequiredWithAll;
use Anteris\Tests\FormRequest\Support\TestsValidationAttributes;
use PHPUnit\Framework\TestCase;

class RequiredWithAllTest extends TestCase
{
    use TestsValidationAttributes;

    public function test_it_is_a_validation_attribute()
    {
        $this->assertValidationAttribute(RequiredWithAll::class);
    }

    public function test_it_returns_correct_rules()
    {
        $this->assertValidationRules(
            ['required_with_all:first_name'],
            new RequiredWithAll('first_name')
        );

        $this->assertValidationRules(
            ['required_with_all:first_name,last_name,email'],
            new RequiredWithAll('first_name', 'last_name', 'email')
        );
    }
}
