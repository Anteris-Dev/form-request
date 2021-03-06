<?php

namespace Anteris\Tests\FormRequest\Stubs;

use Anteris\FormRequest\Attributes\Validation;
use Anteris\FormRequest\FormRequestData;

class CreatePersonRequest extends FormRequestData
{
    #[Validation('required', 'string')]
    public string $first_name;

    #[Validation('required', 'string')]

    public string $last_name;

    #[Validation('required', 'string', 'email')]
    public string $email;
}
