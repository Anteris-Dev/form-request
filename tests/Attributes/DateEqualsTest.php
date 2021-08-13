<?php

namespace Anteris\Tests\FormRequest\Attributes;

use Anteris\FormRequest\Attributes\DateEquals;
use Anteris\Tests\FormRequest\Support\TestsValidationAttributes;
use PHPUnit\Framework\TestCase;

class DateEqualsTest extends TestCase
{
    use TestsValidationAttributes;

    public function test_it_is_a_validation_attribute()
    {
        $this->assertValidationAttribute(DateEquals::class);
    }

    public function test_it_returns_correct_rules()
    {
        $this->assertValidationRules(['date_equals:2021-01-03'], new DateEquals('2021-01-03'));
        $this->assertValidationRules(['date_equals:2021-05-09'], new DateEquals('2021-05-09'));
    }
}
