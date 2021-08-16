<?php

namespace Anteris\Tests\FormRequest\Attributes;

use Anteris\FormRequest\Attributes\Size;
use Anteris\Tests\FormRequest\Support\TestsValidationAttributes;
use PHPUnit\Framework\TestCase;

class SizeTest extends TestCase
{
    use TestsValidationAttributes;

    public function test_it_is_a_validation_attribute()
    {
        $this->assertValidationAttribute(Size::class);
    }

    public function test_it_returns_correct_rules()
    {
        $size = new Size(12);

        $this->assertIsArray($size->getRules());
        $this->assertSame(['size:12'], $size->getRules());
    }
}
