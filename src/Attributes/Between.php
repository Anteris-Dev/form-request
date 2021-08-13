<?php

namespace Anteris\FormRequest\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class Between implements Rule
{
    public function __construct(private int | float $min, private int | float $max)
    {
        //
    }

    public function getRules(): array
    {
        return ["between:{$this->min},{$this->max}"];
    }
}
