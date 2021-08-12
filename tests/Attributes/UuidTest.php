<?php

namespace Anteris\Tests\FormRequest\Attributes;

use Anteris\FormRequest\Attributes\Uuid;
use PHPUnit\Framework\TestCase;

class UuidTest extends TestCase
{
    public function test_it_returns_correct_rules()
    {
        $uuid = new Uuid();

        $this->assertIsArray($uuid->getRules());
        $this->assertSame(['uuid'], $uuid->getRules());
    }
}
