<?php

namespace Anteris\Tests\FormRequest\Attributes;

use Anteris\FormRequest\Attributes\Password;
use Anteris\Tests\FormRequest\Support\TestsValidationAttributes;
use Illuminate\Validation\Rules\Password as BasePassword;
use PHPUnit\Framework\TestCase;

class PasswordTest extends TestCase
{
    use TestsValidationAttributes;

    public function test_it_is_a_validation_attribute()
    {
        $this->assertValidationAttribute(Password::class);
    }

    public function test_it_returns_default_rules()
    {
        $rule = BasePassword::min(12)
            ->letters()
            ->mixedCase()
            ->numbers()
            ->symbols()
            ->uncompromised(0);

        $this->assertValidationRules([ $rule ], new Password());
    }

    public function test_it_returns_correct_rules()
    {
        $rule = BasePassword::min(8)
            ->mixedCase()
            ->symbols();

        $this->assertValidationRules(
            [ $rule ],
            new Password(
                min: 8,
                letters: false,
                mixedCase: true,
                numbers: false,
                symbols: true,
                uncompromised: false
            )
        );
    }

    public function test_it_knows_invalid_rules()
    {
        $rule = BasePassword::min(8)->mixedCase()->symbols();

        $this->assertValidationRulesNot([ $rule ], new Password());
    }
}
