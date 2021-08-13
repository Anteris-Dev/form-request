<?php

namespace Anteris\Tests\FormRequest\Attributes;

use Anteris\FormRequest\Attributes\Numeric;
use PHPUnit\Framework\TestCase;

class NumericTest extends TestCase
{
    public function test_it_returns_correct_rules()
    {
        $numeric = new Numeric();

        $this->assertSame(['numeric'], $numeric->getRules());
    }
}
