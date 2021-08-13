<?php

namespace Anteris\FormRequest\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class Numeric implements Rule
{
    public function getRules(): array
    {
        return ['numeric'];
    }
}
