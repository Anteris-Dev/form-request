<?php

namespace Anteris\FormRequest\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class Uuid implements Rule
{
    public function getRules(): array
    {
        return ['uuid'];
    }
}
