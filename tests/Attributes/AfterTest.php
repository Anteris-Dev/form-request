<?php

namespace Anteris\Tests\FormRequest\Attributes;

use Anteris\FormRequest\Attributes\After;
use Anteris\Tests\FormRequest\Support\TestsValidationAttributes;
use PHPUnit\Framework\TestCase;

class AfterTest extends TestCase
{
    use TestsValidationAttributes;

    public function test_it_is_a_validation_attribute()
    {
        $this->assertValidationAttribute(After::class);
    }

    public function test_it_returns_correct_rules()
    {
        $this->assertValidationRules(['after:2021-08-13'], new After('2021-08-13'));
        $this->assertValidationRules(['after:2021-08-01'], new After('2021-08-01'));
    }
}