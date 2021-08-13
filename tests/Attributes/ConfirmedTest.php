<?php

namespace Anteris\Tests\FormRequest\Attributes;

use Anteris\FormRequest\Attributes\Confirmed;
use Anteris\Tests\FormRequest\Support\TestsValidationAttributes;
use PHPUnit\Framework\TestCase;

class ConfirmedTest extends TestCase
{
    use TestsValidationAttributes;

    public function test_it_is_a_validation_attribute()
    {
        $this->assertValidationAttribute(Confirmed::class);
    }

    public function test_it_returns_correct_rules()
    {
        $this->assertValidationRules(['confirmed'], new Confirmed());
    }
}
