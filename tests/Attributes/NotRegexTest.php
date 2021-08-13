<?php

namespace Anteris\Tests\FormRequest\Attributes;

use Anteris\FormRequest\Attributes\NotRegex;
use PHPUnit\Framework\TestCase;

class NotRegexTest extends TestCase
{
    public function test_it_returns_correct_rules()
    {
        // 10-digit phone number.
        $notRegex = new NotRegex('/^(\d{10})$/');

        $this->assertSame(['not_regex:/^(\d{10})$/'], $notRegex->getRules());
    }
}
