<?php

namespace Anteris\FormRequest\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class Present implements Rule
{
    public function getRules(): array
    {
        return ['present'];
    }
}