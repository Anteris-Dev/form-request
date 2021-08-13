<?php

namespace Anteris\FormRequest\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class Validation implements Rule
{
    private array $rules;

    public function __construct(string ...$rules)
    {
        $rules = $this->expandSeparators($rules);

        $this->rules = $rules;
    }

    public function getRules(): array
    {
        return $this->rules;
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
