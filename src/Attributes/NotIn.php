<?php

namespace Anteris\FormRequest\Attributes;

use Illuminate\Validation\Rules\NotIn as BaseNotIn;

class NotIn extends Rule
{
    private array $rules;

    public function __construct(array $values)
    {
        $this->rules = [ new BaseNotIn($values) ];
    }

    public function getRules(): array
    {
        return $this->rules;
    }
}