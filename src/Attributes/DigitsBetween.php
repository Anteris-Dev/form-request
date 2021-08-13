<?php

namespace Anteris\FormRequest\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class DigitsBetween implements Rule
{
    public function __construct(private int $min, private int $max)
    {
        //
    }

    public function getRules(): array
    {
        return ["digits_between:{$this->min},{$this->max}"];
    }
}