<?php

namespace Anteris\FormRequest\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class ActiveUrl implements Rule
{
    public function getRules(): array
    {
        return ['active_url'];
    }
}
