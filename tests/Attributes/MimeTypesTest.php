<?php

namespace Anteris\Tests\FormRequest\Attributes;

use Anteris\FormRequest\Attributes\MimeTypes;
use PHPUnit\Framework\TestCase;

class MimeTypesTest extends TestCase
{
    public function test_it_returns_correct_rules()
    {
        $mimeTypes = new MimeTypes('video/avi');
        $mimeTypes2 = new MimeTypes('video/quicktime', 'video/avi', 'video/mpeg');

        $this->assertSame(['mimetypes:video/avi'], $mimeTypes->getRules());
        $this->assertSame(['mimetypes:video/quicktime,video/avi,video/mpeg'], $mimeTypes2->getRules());
    }
}