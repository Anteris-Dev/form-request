<?php

namespace Anteris\FormRequest\Attributes;

use Attribute;

#[Attribute]
class Size extends Rule
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