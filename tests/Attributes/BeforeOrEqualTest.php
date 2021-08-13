<?php

namespace Anteris\Tests\FormRequest\Attributes;

use Anteris\FormRequest\Attributes\BeforeOrEqual;
use Anteris\Tests\FormRequest\Support\TestsValidationAttributes;
use PHPUnit\Framework\TestCase;

class BeforeOrEqualTest extends TestCase
{
    use TestsValidationAttributes;

    public function test_it_is_a_validation_attribute()
    {
        $this->assertValidationAttribute(BeforeOrEqual::class);
    }

    public function test_it_returns_correct_rules()
    {
        $this->assertValidationRules(['before_or_equal:03/12/2021'], new BeforeOrEqual('03/12/2021'));
        $this->assertValidationRules(['before_or_equal:06/07/2021'], new BeforeOrEqual('06/07/2021'));
    }
}
