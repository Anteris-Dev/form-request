<?php

namespace Anteris\Tests\FormRequest\Attributes;

use Anteris\FormRequest\Attributes\MultipleOf;
use PHPUnit\Framework\TestCase;

class MultipleOfTest extends TestCase
{
    public function test_it_returns_correct_rules()
    {
        $multipleOf = new MultipleOf(2);

        $this->assertSame(['multiple_of:2'], $multipleOf->getRules());
    }
}
