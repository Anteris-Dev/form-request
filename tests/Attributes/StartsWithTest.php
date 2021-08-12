<?php

namespace Anteris\Tests\FormRequest\Attributes;

use Anteris\FormRequest\Attributes\StartsWith;
use PHPUnit\Framework\TestCase;

class StartsWithTest extends TestCase
{
    public function test_it_returns_correct_rules()
    {
        $startsWith = new StartsWith('foo', 'bar');

        $this->assertIsArray($startsWith->getRules());
        $this->assertSame(['starts_with:foo,bar'], $startsWith->getRules());
    }
}