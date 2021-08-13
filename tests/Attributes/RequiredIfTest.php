<?php

namespace Anteris\Tests\FormRequest\Attributes;

use Anteris\FormRequest\Attributes\RequiredIf;
use Anteris\Tests\FormRequest\Support\TestsValidationAttributes;
use PHPUnit\Framework\TestCase;

class RequiredIfTest extends TestCase
{
    use TestsValidationAttributes;

    public function test_it_is_a_validation_attribute()
    {
        $this->assertValidationAttribute(RequiredIf::class);
    }

    public function test_it_returns_correct_rules()
    {
        $this->assertValidationRules(
            ['required_if:name,Aidan'],
            new RequiredIf('name', 'Aidan')
        );

        $this->assertValidationRules(
            ['required_if:name,Taylor,Brent,Freek'],
            new RequiredIf('name', 'Taylor,Brent,Freek')
        );
    }
}
