<?php

namespace Anteris\Tests\FormRequest\Attributes;

use Anteris\FormRequest\Attributes\Validation;
use PHPUnit\Framework\TestCase;

class ValidationTest extends TestCase
{
    public function test_it_creates_validation_array_from_string()
    {
        $validation = new Validation('required', 'string', 'max:255');

        $this->assertSame(
            ['required', 'string', 'max:255'],
            $validation->getRules()
        );
    }

    public function test_it_expands_pipes()
    {
        $validation = new Validation('required|string|max:255');

        $this->assertSame(
            ['required', 'string', 'max:255'],
            $validation->getRules()
        );
    }
}