<?php

namespace Anteris\FormRequest\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class LessThanOrEqualTo implements Rule
{
    public function __construct(private string $field)
    {
        //
    }

    public function getRules(): array
    {
        return ['lte:' . $this->field];
    }
}
