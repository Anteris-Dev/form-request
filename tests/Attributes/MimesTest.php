<?php

namespace Anteris\Tests\FormRequest\Attributes;

use Anteris\FormRequest\Attributes\Mimes;
use PHPUnit\Framework\TestCase;

class MimesTest extends TestCase
{
    public function test_it_returns_correct_rules()
    {
        $mimes  = new Mimes('jpg', 'bmp');
        $mimes2 = new Mimes('png', 'jpg', 'bmp');

        $this->assertSame(['mimes:jpg,bmp'], $mimes->getRules());
        $this->assertSame(['mimes:png,jpg,bmp'], $mimes2->getRules());
    }
}
