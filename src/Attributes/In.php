<?php

namespace Anteris\FormRequest\Attributes;

use Attribute;
use Illuminate\Validation\Rules\In as BaseIn;

#[Attribute]
class In extends Rule
{
    private array $rules;

    public function __construct(array $values)
    {
        $this->rules = [ new BaseIn($values) ];
    }

    public function getRules(): array
    {
        return $this->rules;
    }
}