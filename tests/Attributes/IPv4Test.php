<?php

namespace Anteris\Tests\FormRequest\Attributes;

use Anteris\FormRequest\Attributes\IPv4;
use Anteris\Tests\FormRequest\Support\TestsValidationAttributes;
use PHPUnit\Framework\TestCase;

class IPv4Test extends TestCase
{
    use TestsValidationAttributes;

    public function test_it_is_a_validation_attribute()
    {
        $this->assertValidationAttribute(IPv4::class);
    }

    public function test_it_returns_correct_rules()
    {
        $this->assertValidationRules(['ipv4'], new IPv4());
    }
}
