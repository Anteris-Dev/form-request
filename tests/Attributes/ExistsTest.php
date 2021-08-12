<?php

namespace Anteris\Tests\FormRequest\Attributes;

use Anteris\FormRequest\Attributes\Exists;
use Illuminate\Validation\Rules\Exists as BaseExists;
use PHPUnit\Framework\TestCase;

class ExistsTest extends TestCase
{
    public function test_it_returns_correct_rules()
    {
        $exists = new Exists('users', 'id');

        $this->assertIsArray($exists->getRules());
        $this->assertCount(1, $exists->getRules());
        $this->assertContainsOnlyInstancesOf(BaseExists::class, $exists->getRules());
    }
}
