<?php

namespace Anteris\FormRequest\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class File implements Rule
{
    public function getRules(): array
    {
        return ['file'];
    }
}