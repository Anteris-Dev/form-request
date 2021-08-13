<?php

namespace Anteris\Tests\FormRequest\Attributes;

use Anteris\FormRequest\Attributes\IP;
use Anteris\Tests\FormRequest\Support\TestsValidationAttributes;
use PHPUnit\Framework\TestCase;

class IPTest extends TestCase
{
    use TestsValidationAttributes;

    public function test_it_is_a_validation_attribute()
    {
        $this->assertValidationAttribute(IP::class);
    }

    public function test_it_returns_correct_rules()
    {
        $this->assertValidationRules(['ip'], new IP());
    }
}