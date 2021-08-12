<?php

namespace Anteris\FormRequest\Attributes;

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