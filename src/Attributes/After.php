<?php

namespace Anteris\FormRequest\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class After implements Rule
{
    public function __construct(private string $date)
    {
        //
    }

    public function getRules(): array
    {
        return ['after:' . $this->date];
    }
}