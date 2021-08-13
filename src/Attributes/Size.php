<?php

namespace Anteris\FormRequest\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class Size implements Rule
{
    public function __construct(private int $size)
    {
        //
    }

    public function getRules(): array
    {
        return ['size:' . $this->size];
    }
}
