<?php

namespace Anteris\FormRequest\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class ExcludeUnless implements Rule
{
    public function __construct(private string $field, private string $value)
    {
        //
    }

    public function getRules(): array
    {
        return ["exclude_unless:{$this->field},{$this->value}"];
    }
}