<?php

namespace Anteris\FormRequest\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class Date implements Rule
{
    public function getRules(): array
    {
        return ['date'];
    }
}
