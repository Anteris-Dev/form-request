<?php

namespace Anteris\Tests\FormRequest\Attributes;

use Anteris\FormRequest\Attributes\Nullable;
use PHPUnit\Framework\TestCase;

class NullableTest extends TestCase
{
    public function test_it_returns_correct_rules()
    {
        $nullable = new Nullable();

        $this->assertSame(['nullable'], $nullable->getRules());
    }
}