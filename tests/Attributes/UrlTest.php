<?php

namespace Anteris\Tests\FormRequest\Attributes;

use Anteris\FormRequest\Attributes\Url;
use Anteris\Tests\FormRequest\Support\TestsValidationAttributes;
use PHPUnit\Framework\TestCase;

class UrlTest extends TestCase
{
    use TestsValidationAttributes;

    public function test_it_is_a_validation_attribute()
    {
        $this->assertValidationAttribute(Url::class);
    }

    public function test_it_returns_correct_rules()
    {
        $url = new Url();

        $this->assertIsArray($url->getRules());
        $this->assertSame(['url'], $url->getRules());
    }
}
