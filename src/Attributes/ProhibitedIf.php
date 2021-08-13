<?php

namespace Anteris\FormRequest\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class ProhibitedIf implements Rule
{
    private array $values;

    public function __construct(private string $field, string ...$values)
    {
        $this->values = $values;
    }

    public function getRules(): array
    {
        return ["prohibited_if:{$this->field}," . implode(',', $this->values)];
    }
}