<?php

namespace Anteris\FormRequest\Attributes;

use Attribute;

#[Attribute]
class Validation
{
    public array $rules;

    public function __construct($rules)
    {
        $rules = is_array($rules) ? $rules : func_get_args();

        $rules = $this->expandSeparators($rules);

        $this->rules = $rules;
    }

    private function expandSeparators(array $rules): array
    {
        $expandedRules = [];

        foreach ($rules as $rule) {
            $rule = explode('|', $rule);

            $expandedRules = array_merge_recursive($expandedRules, $rule);
        }

        return $expandedRules;
    }
}