<?php

namespace AnterisDev\Tests\FormRequest\Stubs;

use AnterisDev\FormRequest\Attributes\Validation;
use AnterisDev\FormRequest\FormRequestData;

class CreatePersonRequest extends FormRequestData
{
    #[Validation('required', 'string')]
    public string $first_name;

    #[Validation('required', 'string')]
    public string $last_name;

    #[Validation('required', 'string', 'email')]
    public string $email;
}