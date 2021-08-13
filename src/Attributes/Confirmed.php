<?php

namespace Anteris\FormRequest\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class Confirmed implements Rule
{
    public function getRules(): array
    {
        return ['confirmed'];
    }
}
