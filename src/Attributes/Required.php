<?php

namespace Anteris\FormRequest\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class Required implements Rule
{
    public function getRules(): array
    {
        return ['required'];
    }
}