<?php

namespace Anteris\Tests\FormRequest\Attributes;

use Anteris\FormRequest\Attributes\AfterOrEqual;
use Anteris\Tests\FormRequest\Support\TestsValidationAttributes;
use PHPUnit\Framework\TestCase;

class AfterOrEqualTest extends TestCase
{
    use TestsValidationAttributes;

    public function test_it_is_a_validation_attribute()
    {
        $this->assertValidationAttribute(AfterOrEqual::class);
    }

    public function test_it_returns_correct_rules()
    {
        $this->assertValidationRules(['after_or_equal:2021-08-01'], new AfterOrEqual('2021-08-01'));
        $this->assertValidationRules(['after_or_equal:2021-01-12'], new AfterOrEqual('2021-01-12'));
    }
}
