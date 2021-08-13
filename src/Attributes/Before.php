<?php

namespace Anteris\FormRequest\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class Before implements Rule
{
    public function __construct(private string $date)
    {
        //
    }

    public function getRules(): array
    {
        return ['before:' . $this->date];
    }
}
