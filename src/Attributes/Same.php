<?php

namespace Anteris\FormRequest\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class Same implements Rule
{
    public function __construct(private string $fieldName)
    {
        //
    }

    public function getRules(): array
    {
        return ['same:' . $this->fieldName];
    }
}
