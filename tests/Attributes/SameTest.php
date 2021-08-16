<?php

namespace Anteris\Tests\FormRequest\Attributes;

use Anteris\FormRequest\Attributes\Same;
use Anteris\Tests\FormRequest\Support\TestsValidationAttributes;
use PHPUnit\Framework\TestCase;

class SameTest extends TestCase
{
    use TestsValidationAttributes;

    public function test_it_is_a_validation_attribute()
    {
        $this->assertValidationAttribute(Same::class);
    }

    public function test_it_returns_correct_rules()
    {
        $same = new Same('password_confirmation');

        $this->assertIsArray($same->getRules());
        $this->assertSame(['same:password_confirmation'], $same->getRules());
    }
}
