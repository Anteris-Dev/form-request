<?php

namespace Anteris\FormRequest\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class DateEquals implements Rule
{
    public function __construct(private string $date)
    {
        //
    }

    public function getRules(): array
    {
        return ['date_equals:' . $this->date];
    }
}