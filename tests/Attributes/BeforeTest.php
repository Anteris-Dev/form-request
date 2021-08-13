<?php

namespace Anteris\Tests\FormRequest\Attributes;

use Anteris\FormRequest\Attributes\Before;
use Anteris\Tests\FormRequest\Support\TestsValidationAttributes;
use PHPUnit\Framework\TestCase;

class BeforeTest extends TestCase
{
    use TestsValidationAttributes;

    public function test_it_is_a_validation_attribute()
    {
        $this->assertValidationAttribute(Before::class);
    }

    public function test_it_returns_correct_rules()
    {
        $this->assertValidationRules(['before:2021-07-07'], new Before('2021-07-07'));
        $this->assertValidationRules(['before:2021-05-03'], new Before('2021-05-03'));
    }
}
