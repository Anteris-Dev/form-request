<?php

namespace Anteris\FormRequest\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class GreaterThan implements Rule
{
    public function __construct(private string $field)
    {
        //
    }

    public function getRules(): array
    {
        return ['gt:' . $this->field];
    }
}
