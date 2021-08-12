<?php

namespace Anteris\FormRequest\Attributes;

use Attribute;

#[Attribute]
class StartsWith extends Rule
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