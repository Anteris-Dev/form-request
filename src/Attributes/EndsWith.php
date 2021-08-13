<?php

namespace Anteris\FormRequest\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class EndsWith implements Rule
{
    private array $validEndingStrings;

    public function __construct(string ...$string)
    {
        $this->validEndingStrings = $string;
    }

    public function getRules(): array
    {
        return ['ends_with:' . implode(',', $this->validEndingStrings)];
    }
}
