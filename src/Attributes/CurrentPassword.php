<?php

namespace Anteris\FormRequest\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class CurrentPassword implements Rule
{
    public function getRules(): array
    {
        return ['current_password'];
    }
}