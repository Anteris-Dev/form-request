<?php

namespace Anteris\FormRequest\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class GreatThanOrEqualTo implements Rule
{
    public function __construct(private string $field)
    {
        //
    }

    public function getRules(): array
    {
        return ['gte:' . $this->field];
    }
}