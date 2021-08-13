<?php

namespace Anteris\FormRequest\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class Url implements Rule
{
    public function getRules(): array
    {
        return ['url'];
    }
}
