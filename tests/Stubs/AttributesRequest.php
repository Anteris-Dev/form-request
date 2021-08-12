<?php

namespace Anteris\Tests\FormRequest\Stubs;

use Anteris\FormRequest\Attributes\Email;
use Anteris\FormRequest\Attributes\Same;
use Anteris\FormRequest\Attributes\StartsWith;
use Anteris\FormRequest\FormRequestData;

class AttributesRequest extends FormRequestData
{
    #[StartsWith('Stev')]
    public string $first_name;

    public int $age;

    #[Email]
    public string $email;

    #[Email]
    #[Same('email')]
    public string $email_confirmation;
}