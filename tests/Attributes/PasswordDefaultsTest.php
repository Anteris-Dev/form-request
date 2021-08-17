<?php

namespace Anteris\Tests\FormRequest\Attributes;

use Anteris\FormRequest\Attributes\PasswordDefaults;
use Anteris\Tests\FormRequest\Support\TestsValidationAttributes;
use Illuminate\Validation\Rules\Password as BasePassword;
use PHPUnit\Framework\TestCase;

class PasswordDefaultsTest extends TestCase
{
    use TestsValidationAttributes;

    public function test_it_is_a_validation_attribute()
    {
        $this->assertValidationAttribute(PasswordDefaults::class);
    }

    public function test_it_returns_defaults()
    {
        $expected = BasePassword::min(21)
            ->symbols()
            ->mixedCase()
            ->uncompromised()
            ->numbers()
            ->letters();

        BasePassword::defaults(fn() => $expected);

        $this->assertValidationRules([ $expected ], new PasswordDefaults());
        $this->assertValidationRulesNot(
            [ BasePassword::min(89) ],
            new PasswordDefaults()
        );

        $newExpected = BasePassword::min(8);

        BasePassword::defaults(fn() => $newExpected);

        $this->assertValidationRules([ $newExpected ], new PasswordDefaults());
        $this->assertValidationRulesNot([ $expected ], new PasswordDefaults());
    }
}