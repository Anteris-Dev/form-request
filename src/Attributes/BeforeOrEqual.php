<?php

namespace Anteris\FormRequest\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class BeforeOrEqual implements Rule
{
    public function __construct(private string $date)
    {
        //
    }

    public function getRules(): array
    {
        return ['before_or_equal:' . $this->date];
    }
}