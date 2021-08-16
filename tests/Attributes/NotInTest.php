<?php

namespace Anteris\Tests\FormRequest\Attributes;

use Anteris\FormRequest\Attributes\NotIn;
use Anteris\Tests\FormRequest\Support\TestsValidationAttributes;
use Illuminate\Validation\Rules\NotIn as BaseNotIn;
use PHPUnit\Framework\TestCase;

class NotInTest extends TestCase
{
    use TestsValidationAttributes;

    public function test_it_is_a_validation_attribute()
    {
        $this->assertValidationAttribute(NotIn::class);
    }

    public function test_it_returns_correct_rules()
    {
        $exists = new NotIn(['prop-1', 'prop-2', 'prop-3']);

        $this->assertIsArray($exists->getRules());
        $this->assertCount(1, $exists->getRules());
        $this->assertContainsOnlyInstancesOf(BaseNotIn::class, $exists->getRules());
    }
}
