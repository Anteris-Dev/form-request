<?php

namespace Anteris\Tests\FormRequest\Attributes;

use Anteris\FormRequest\Attributes\CurrentPassword;
use Anteris\Tests\FormRequest\Support\TestsValidationAttributes;
use PHPUnit\Framework\TestCase;

class CurrentPasswordTest extends TestCase
{
    use TestsValidationAttributes;

    public function test_it_is_a_validation_attribute()
    {
        $this->assertValidationAttribute(CurrentPassword::class);
    }

    public function test_it_returns_correct_rules_without_guard()
    {
        $password = new CurrentPassword();

        $this->assertValidationRules(['current_password'], $password);
    }

    public function test_it_returns_correct_rules_with_guard()
    {
        $password = new CurrentPassword('admin');
        $password2 = new CurrentPassword('user');

        $this->assertValidationRules(['current_password:admin'], $password);
        $this->assertValidationRules(['current_password:user'], $password2);
    }
}
