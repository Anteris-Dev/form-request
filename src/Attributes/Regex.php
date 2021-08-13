<?php

namespace Anteris\FormRequest\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class Regex implements Rule
{
    public function __construct(private string $pattern)
    {
        //
    }

    public function getRules(): array
    {
        return ['regex:' . $this->pattern];
    }
}
