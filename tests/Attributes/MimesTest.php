<?php

namespace Anteris\Tests\FormRequest\Attributes;

use Anteris\FormRequest\Attributes\Mimes;
use Anteris\Tests\FormRequest\Support\TestsValidationAttributes;
use PHPUnit\Framework\TestCase;

class MimesTest extends TestCase
{
    use TestsValidationAttributes;

    public function test_it_is_a_validation_attribute()
    {
        $this->assertValidationAttribute(Mimes::class);
    }

    public function test_it_returns_correct_rules()
    {
        $mimes  = new Mimes('jpg', 'bmp');
        $mimes2 = new Mimes('png', 'jpg', 'bmp');

        $this->assertSame(['mimes:jpg,bmp'], $mimes->getRules());
        $this->assertSame(['mimes:png,jpg,bmp'], $mimes2->getRules());
    }
}
