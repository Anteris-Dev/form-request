<?php

namespace Anteris\FormRequest\Attributes;

use Attribute;

#[Attribute]
class Same extends Rule
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
