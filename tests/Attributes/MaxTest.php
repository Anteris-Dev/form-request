<?php

namespace Anteris\Tests\FormRequest\Attributes;

use Anteris\FormRequest\Attributes\Max;
use PHPUnit\Framework\TestCase;

class MaxTest extends TestCase
{
    public function test_it_returns_correct_rules()
    {
        $max  = new Max(2);
        $max2 = new Max(255);

        $this->assertSame(['max:2'], $max->getRules());
        $this->assertSame(['max:255'], $max2->getRules());
    }
}
