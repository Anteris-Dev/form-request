<?php

namespace Anteris\Tests\FormRequest\Attributes;

use Anteris\FormRequest\Attributes\Present;
use Anteris\Tests\FormRequest\Support\TestsValidationAttributes;
use PHPUnit\Framework\TestCase;

class PresentTest extends TestCase
{
    use TestsValidationAttributes;

    public function test_it_is_validation_attribute()
    {
        $this->assertValidationAttribute(Present::class);
    }

    public function test_it_returns_correct_rules()
    {
        $this->assertValidationRules(
            ['present'],
            new Present()
        );
    }
}
