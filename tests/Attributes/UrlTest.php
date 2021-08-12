<?php

namespace Anteris\Tests\FormRequest\Attributes;

use Anteris\FormRequest\Attributes\Url;
use PHPUnit\Framework\TestCase;

class UrlTest extends TestCase
{
    public function test_it_returns_correct_rules()
    {
        $url = new Url();

        $this->assertIsArray($url->getRules());
        $this->assertSame(['url'], $url->getRules());
    }
}
