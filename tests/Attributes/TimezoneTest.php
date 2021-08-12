<?php

namespace Anteris\Tests\FormRequest\Attributes;

use Anteris\FormRequest\Attributes\Timezone;
use PHPUnit\Framework\TestCase;

class TimezoneTest extends TestCase
{
    public function test_it_returns_correct_rules()
    {
        $timezone = new Timezone();

        $this->assertIsArray($timezone->getRules());
        $this->assertSame(['timezone'], $timezone->getRules());
    }
}