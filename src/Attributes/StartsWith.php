<?php

namespace Anteris\FormRequest\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class StartsWith implements Rule
{
    private array $validStartingStrings;

    public function __construct(string ...$string)
    {
        $this->validStartingStrings = $string;
    }

    public function getRules(): array
    {
        return ['starts_with:' . implode(',', $this->validStartingStrings)];
    }
}
