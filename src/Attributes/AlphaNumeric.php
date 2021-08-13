<?php

namespace Anteris\FormRequest\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class AlphaNumeric implements Rule
{
    public function getRules(): array
    {
        return ['alpha_num'];
    }
}
