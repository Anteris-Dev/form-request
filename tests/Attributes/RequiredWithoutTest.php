<?php

namespace Anteris\Tests\FormRequest\Attributes;

use Anteris\FormRequest\Attributes\RequiredWithout;
use Anteris\Tests\FormRequest\Support\TestsValidationAttributes;
use PHPUnit\Framework\TestCase;

class RequiredWithoutTest extends TestCase
{
    use TestsValidationAttributes;

    public function test_it_is_a_validation_attribute()
    {
        $this->assertValidationAttribute(RequiredWithout::class);
    }

    public function test_it_returns_correct_rules()
    {
        $this->assertValidationRules(
            ['required_without:first_name'],
            new RequiredWithout('first_name')
        );

        $this->assertValidationRules(
            ['required_without:first_name,last_name,email'],
            new RequiredWithout('first_name', 'last_name', 'email')
        );
    }
}