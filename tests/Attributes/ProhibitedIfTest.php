<?php

namespace Anteris\Tests\FormRequest\Attributes;

use Anteris\FormRequest\Attributes\ProhibitedIf;
use Anteris\Tests\FormRequest\Support\TestsValidationAttributes;
use PHPUnit\Framework\TestCase;

class ProhibitedIfTest extends TestCase
{
    use TestsValidationAttributes;

    public function test_it_is_a_validation_attribute()
    {
        $this->assertValidationAttribute(ProhibitedIf::class);
    }

    public function test_it_returns_correct_rules()
    {
        $this->assertValidationRules(
            ['prohibited_if:name,Aidan'],
            new ProhibitedIf('name', 'Aidan')
        );

        $this->assertValidationRules(
            ['prohibited_if:name,Aidan,Larry,Bob,Jim'],
            new ProhibitedIf('name', 'Aidan', 'Larry', 'Bob', 'Jim')
        );
    }
}
