<?php

namespace Anteris\FormRequest\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class NotRegex implements Rule
{
    public function __construct(private string $pattern)
    {
        //
    }

    public function getRules(): array
    {
        return ['not_regex:' . $this->pattern];
    }
}
