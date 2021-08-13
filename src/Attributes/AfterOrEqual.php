<?php

namespace Anteris\FormRequest\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class AfterOrEqual implements Rule
{
    public function __construct(private string $date)
    {
        //
    }

    public function getRules(): array
    {
        return ['after_or_equal:' . $this->date];
    }
}