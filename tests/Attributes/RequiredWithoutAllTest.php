<?php

namespace Anteris\Tests\FormRequest\Attributes;

use Anteris\FormRequest\Attributes\RequiredWithoutAll;
use Anteris\Tests\FormRequest\Support\TestsValidationAttributes;
use PHPUnit\Framework\TestCase;

class RequiredWithoutAllTest extends TestCase
{
    use TestsValidationAttributes;

    public function test_it_is_a_validation_attribute()
    {
        $this->assertValidationAttribute(RequiredWithoutAll::class);
    }

    public function test_it_returns_correct_rules()
    {
        $this->assertValidationRules(
            ['required_without_all:first_name'],
            new RequiredWithoutAll('first_name')
        );

        $this->assertValidationRules(
            ['required_without_all:first_name,last_name,email'],
            new RequiredWithoutAll('first_name', 'last_name', 'email')
        );
    }
}