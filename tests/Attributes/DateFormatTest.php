<?php

namespace Anteris\Tests\FormRequest\Attributes;

use Anteris\FormRequest\Attributes\DateFormat;
use Anteris\Tests\FormRequest\Support\TestsValidationAttributes;
use PHPUnit\Framework\TestCase;

class DateFormatTest extends TestCase
{
    use TestsValidationAttributes;

    public function test_it_is_a_validation_attribute()
    {
        $this->assertValidationAttribute(DateFormat::class);
    }

    public function test_it_returns_correct_rules()
    {
        $this->assertValidationRules(['date_format:Y-m-d'], new DateFormat('Y-m-d'));
        $this->assertValidationRules(['date_format:m/d/Y'], new DateFormat('m/d/Y'));
    }
}
