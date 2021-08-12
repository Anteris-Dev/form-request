<?php

namespace Anteris\Tests\FormRequest\Attributes;

use Anteris\FormRequest\Attributes\Same;
use PHPUnit\Framework\TestCase;

class SameTest extends TestCase
{
    public function test_it_returns_correct_rules()
    {
        $same = new Same('password_confirmation');

        $this->assertIsArray($same->getRules());
        $this->assertSame(['same:password_confirmation'], $same->getRules());
    }
}
