<?php

namespace Anteris\Tests\FormRequest\Attributes;

use Anteris\FormRequest\Attributes\Different;
use Anteris\FormRequest\Attributes\Rule;
use Anteris\Tests\FormRequest\Support\TestsValidationAttributes;
use PHPUnit\Framework\TestCase;

class DifferentTest extends TestCase
{
    use TestsValidationAttributes;

    public function test_it_is_a_validation_attribute()
    {
        $this->assertValidationAttribute(Different::class);
    }

    public function test_it_returns_correct_rules()
    {
        $different = new Different('some_field');
        $different2 = new Different('some_other_field');

        $this->assertValidationRules(['different:some_field'], $different);
        $this->assertValidationRules(['different:some_other_field'], $different2);
    }
}