<?php

namespace Anteris\FormRequest\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class RequiredWithoutAll implements Rule
{
    private array $fields;

    public function __construct(string ...$fields)
    {
        $this->fields = $fields;
    }

    public function getRules(): array
    {
        return [
            'required_without_all:' . implode(',', $this->fields),
        ];
    }
}
