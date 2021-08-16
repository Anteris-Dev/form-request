<?php

namespace Anteris\Tests\FormRequest\Attributes;

use Anteris\FormRequest\Attributes\In;
use Anteris\Tests\FormRequest\Support\TestsValidationAttributes;
use Illuminate\Validation\Rules\In as BaseIn;
use PHPUnit\Framework\TestCase;

class InTest extends TestCase
{
    use TestsValidationAttributes;

    public function test_it_is_a_validation_attribute()
    {
        $this->assertValidationAttribute(In::class);
    }

    public function test_it_returns_correct_rules()
    {
        $exists = new In(['prop-1', 'prop-2', 'prop-3']);

        $this->assertIsArray($exists->getRules());
        $this->assertCount(1, $exists->getRules());
        $this->assertContainsOnlyInstancesOf(BaseIn::class, $exists->getRules());
    }
}
