<?php

namespace Anteris\Tests\FormRequest\Attributes;

use Anteris\FormRequest\Attributes\ActiveUrl;
use Anteris\Tests\FormRequest\Support\TestsValidationAttributes;
use PHPUnit\Framework\TestCase;

class ActiveUrlTest extends TestCase
{
    use TestsValidationAttributes;

    public function test_it_is_a_validation_attribute()
    {
        $this->assertValidationAttribute(ActiveUrl::class);
    }

    public function test_it_returns_correct_rules()
    {
        $this->assertValidationRules(['active_url'], new ActiveUrl());
    }
}
