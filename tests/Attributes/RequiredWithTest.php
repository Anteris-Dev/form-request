<?php

namespace Anteris\Tests\FormRequest\Attributes;

use Anteris\FormRequest\Attributes\RequiredWith;
use Anteris\Tests\FormRequest\Support\TestsValidationAttributes;
use PHPUnit\Framework\TestCase;

class RequiredWithTest extends TestCase
{
    use TestsValidationAttributes;

    public function test_it_is_a_validation_attribute()
    {
        $this->assertValidationAttribute(RequiredWith::class);
    }

    public function test_it_returns_correct_rules()
    {
        $this->assertValidationRules(
            ['required_with:first_name'],
            new RequiredWith('first_name')
        );

        $this->assertValidationRules(
            ['required_with:first_name,last_name,email'],
            new RequiredWith('first_name', 'last_name', 'email')
        );
    }
}