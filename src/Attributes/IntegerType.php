<?php

namespace Anteris\FormRequest\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class IntegerType implements Rule
{
    public function getRules(): array
    {
        return ['integer'];
    }
}
