<?php

namespace Anteris\FormRequest\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class Image implements Rule
{
    public function getRules(): array
    {
        return ['image'];
    }
}
