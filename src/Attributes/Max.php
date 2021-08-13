<?php

namespace Anteris\FormRequest\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class Max implements Rule
{
    public function __construct(private int $value)
    {
        //
    }

    public function getRules(): array
    {
        return ['max:' . $this->value];
    }
}
