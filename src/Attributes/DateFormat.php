<?php

namespace Anteris\FormRequest\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class DateFormat implements Rule
{
    public function __construct(private string $format)
    {
        //
    }

    public function getRules(): array
    {
        return ['date_format:' . $this->format];
    }
}