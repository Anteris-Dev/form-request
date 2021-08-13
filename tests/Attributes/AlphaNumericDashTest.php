<?php

namespace Anteris\Tests\FormRequest\Attributes;

use Anteris\FormRequest\Attributes\AlphaNumericDash;
use Anteris\Tests\FormRequest\Support\TestsValidationAttributes;
use PHPUnit\Framework\TestCase;

class AlphaNumericDashTest extends TestCase
{
    use TestsValidationAttributes;

    public function test_it_is_a_validation_attribute()
    {
        $this->assertValidationAttribute(AlphaNumericDash::class);
    }

    public function test_it_returns_correct_rules()
    {
        $this->assertValidationRules(['alpha_dash'], new AlphaNumericDash());
    }
}