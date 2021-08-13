<?php

namespace Anteris\Tests\FormRequest\Attributes;

use Anteris\FormRequest\Attributes\ExcludeUnless;
use Anteris\Tests\FormRequest\Support\TestsValidationAttributes;
use PHPUnit\Framework\TestCase;

class ExcludeUnlessTest extends TestCase
{
    use TestsValidationAttributes;

    public function test_it_is_a_validation_attribute()
    {
        $this->assertValidationAttribute(ExcludeUnless::class);
    }

    public function test_it_returns_correct_rules()
    {
        $this->assertValidationRules(
            ['exclude_unless:first_name,Aidan'],
            new ExcludeUnless('first_name', 'Aidan')
        );

        $this->assertValidationRules(
            ['exclude_unless:last_name,Casey'],
            new ExcludeUnless('last_name', 'Casey')
        );
    }
}
