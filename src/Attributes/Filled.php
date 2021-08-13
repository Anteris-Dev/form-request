<?php

namespace Anteris\FormRequest\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class Filled implements Rule
{
    public function getRules(): array
    {
        return ['filled'];
    }
}
