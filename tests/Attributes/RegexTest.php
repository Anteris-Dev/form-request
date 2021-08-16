<?php

namespace Anteris\Tests\FormRequest\Attributes;

use Anteris\FormRequest\Attributes\Regex;
use Anteris\Tests\FormRequest\Support\TestsValidationAttributes;
use PHPUnit\Framework\TestCase;

class RegexTest extends TestCase
{
    use TestsValidationAttributes;

    public function test_it_is_a_validation_attribute()
    {
        $this->assertValidationAttribute(Regex::class);
    }

    public function test_it_returns_correct_rules()
    {
        // 10-digit phone number.
        $regex = new Regex('/^(\d{10})$/');

        $this->assertIsArray($regex->getRules());
        $this->assertSame(['regex:/^(\d{10})$/'], $regex->getRules());
    }
}
