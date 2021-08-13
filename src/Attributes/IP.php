<?php

namespace Anteris\FormRequest\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class IP implements Rule
{
    public function getRules(): array
    {
        return ['ip'];
    }
}
