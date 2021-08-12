<?php

namespace Anteris\Tests\FormRequest\Attributes;

use Anteris\FormRequest\Attributes\Email;
use PHPUnit\Framework\TestCase;

class EmailTest extends TestCase
{
    public function test_it_returns_correct_rules()
    {
        $email1 = new Email(Email::DnsCheckValidation | Email::RfcValidation);
        $email2 = new Email(Email::DnsCheckValidation | Email::SpoofCheckValidation);
        $email3 = new Email(Email::NoRfcWarningsValidation | Email::FilterEmailValidation);
        $email4 = new Email();

        $this->assertSame(['email:rfc,dns'], $email1->getRules());
        $this->assertSame(['email:dns,spoof'], $email2->getRules());
        $this->assertSame(['email:strict,filter'], $email3->getRules());
        $this->assertSame(['email:rfc'], $email4->getRules());
    }
}
