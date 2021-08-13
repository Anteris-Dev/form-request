<?php

namespace Anteris\FormRequest\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class Mimes implements Rule
{
    private array $mimes;

    public function __construct(string ...$mimes)
    {
        $this->mimes = $mimes;
    }

    public function getRules(): array
    {
        return ['mimes:' . implode(',', $this->mimes)];
    }
}
