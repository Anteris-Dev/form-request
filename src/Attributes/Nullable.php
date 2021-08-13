<?php

namespace Anteris\FormRequest\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class Nullable implements Rule
{
    public function getRules(): array
    {
        return ['nullable'];
    }
}
