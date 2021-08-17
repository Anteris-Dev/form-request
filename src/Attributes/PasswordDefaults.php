<?php

namespace Anteris\FormRequest\Attributes;

use Attribute;
use Illuminate\Validation\Rules\Password as BasePassword;

#[Attribute(Attribute::TARGET_PROPERTY)]
class PasswordDefaults implements Rule
{
    public function getRules(): array
    {
        return [ BasePassword::default() ];
    }
}