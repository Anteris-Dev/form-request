<?php

namespace Anteris\Tests\FormRequest\Attributes;

use Anteris\FormRequest\Attributes\Min;
use Anteris\Tests\FormRequest\Support\TestsValidationAttributes;
use PHPUnit\Framework\TestCase;

class MinTest extends TestCase
{
    use TestsValidationAttributes;

    public function test_it_is_a_validation_attribute()
    {
        $this->assertValidationAttribute(Min::class);
    }

    public function test_it_returns_correct_rules()
    {
        $min  = new Min(2);
        $min2 = new Min(8);

        $this->assertSame(['min:2'], $min->getRules());
        $this->assertSame(['min:8'], $min2->getRules());
    }
}
