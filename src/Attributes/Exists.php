<?php

namespace Anteris\FormRequest\Attributes;

use Attribute;
use Illuminate\Validation\Rules\Exists as BaseExists;

#[Attribute]
class Exists extends Rule
{
    private array $rules;

    public function __construct(string $table, string $column)
    {
        $this->rules = [ new BaseExists($table, $column) ];
    }

    public function getRules(): array
    {
        return $this->rules;
    }
}
