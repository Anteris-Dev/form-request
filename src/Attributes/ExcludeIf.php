<?php

namespace Anteris\FormRequest\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class ExcludeIf implements Rule
{
    public function __construct(private string $field, private string $value)
    {
        //
    }

    public function getRules(): array
    {
        return ["exclude_if:{$this->field},{$this->value}"];
    }
}
