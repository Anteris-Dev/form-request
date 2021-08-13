<?php

namespace Anteris\FormRequest\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class Integer implements Rule
{
    public function getRules(): array
    {
        return ['integer'];
    }
}
