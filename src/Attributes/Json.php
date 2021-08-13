<?php

namespace Anteris\FormRequest\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class Json implements Rule
{
    public function getRules(): array
    {
        return ['json'];
    }
}