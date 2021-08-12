<?php

namespace Anteris\Tests\FormRequest\Attributes;

use Anteris\FormRequest\Attributes\Size;
use PHPUnit\Framework\TestCase;

class SizeTest extends TestCase
{
    public function test_it_returns_correct_rules()
    {
        $size = new Size(12);

        $this->assertIsArray($size->getRules());
        $this->assertSame(['size:12'], $size->getRules());
    }
}