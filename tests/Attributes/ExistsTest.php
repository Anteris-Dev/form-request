<?php

namespace Anteris\Tests\FormRequest\Attributes;

use Anteris\FormRequest\Attributes\Exists;
use Anteris\Tests\FormRequest\Support\TestsValidationAttributes;
use Illuminate\Validation\Rules\Exists as BaseExists;
use PHPUnit\Framework\TestCase;

class ExistsTest extends TestCase
{
    use TestsValidationAttributes;

    public function test_it_is_a_validation_attribute()
    {
        $this->assertValidationAttribute(Exists::class);
    }

    public function test_it_returns_correct_rules()
    {
        $exists = new Exists('users', 'id');

        $this->assertIsArray($exists->getRules());
        $this->assertCount(1, $exists->getRules());
        $this->assertContainsOnlyInstancesOf(BaseExists::class, $exists->getRules());
    }
}
