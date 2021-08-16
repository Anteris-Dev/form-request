<?php

namespace Anteris\Tests\FormRequest\Attributes;

use Anteris\FormRequest\Attributes\StartsWith;
use Anteris\Tests\FormRequest\Support\TestsValidationAttributes;
use PHPUnit\Framework\TestCase;

class StartsWithTest extends TestCase
{
    use TestsValidationAttributes;

    public function test_it_is_a_validation_attribute()
    {
        $this->assertValidationAttribute(StartsWith::class);
    }

    public function test_it_returns_correct_rules()
    {
        $startsWith = new StartsWith('foo', 'bar');

        $this->assertIsArray($startsWith->getRules());
        $this->assertSame(['starts_with:foo,bar'], $startsWith->getRules());
    }
}
