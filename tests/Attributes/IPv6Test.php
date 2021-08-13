<?php

namespace Anteris\Tests\FormRequest\Attributes;

use Anteris\FormRequest\Attributes\IPv6;
use Anteris\Tests\FormRequest\Support\TestsValidationAttributes;
use PHPUnit\Framework\TestCase;

class IPv6Test extends TestCase
{
    use TestsValidationAttributes;

    public function test_it_is_a_validation_attribute()
    {
        $this->assertValidationAttribute(IPv6::class);
    }

    public function test_it_returns_correct_rules()
    {
        $this->assertValidationRules(['ipv6'], new IPv6());
    }
}
