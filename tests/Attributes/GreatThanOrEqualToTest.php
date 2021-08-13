<?php

namespace Anteris\Tests\FormRequest\Attributes;

use Anteris\FormRequest\Attributes\GreatThanOrEqualTo;
use Anteris\Tests\FormRequest\Support\TestsValidationAttributes;
use PHPUnit\Framework\TestCase;

class GreatThanOrEqualToTest extends TestCase
{
    use TestsValidationAttributes;

    public function test_it_is_a_validation_attribute()
    {
        $this->assertValidationAttribute(GreatThanOrEqualTo::class);
    }

    public function test_it_returns_correct_rules()
    {
        $this->assertValidationRules(
            ['gte:some_field'],
            new GreatThanOrEqualTo('some_field')
        );

        $this->assertValidationRules(
            ['gte:some_other_field'],
            new GreatThanOrEqualTo('some_other_field')
        );
    }
}
