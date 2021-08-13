<?php

namespace Anteris\Tests\FormRequest\Attributes;

use Anteris\FormRequest\Attributes\CurrentPassword;
use PHPUnit\Framework\TestCase;

class CurrentPasswordTest extends TestCase
{
    public function test_it_returns_correct_rules()
    {
        $password = new CurrentPassword();

        $this->assertSame(['current_password'], $password->getRules());
    }
}
