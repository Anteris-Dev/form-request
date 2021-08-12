<?php

namespace AnterisDev\FormRequest\Reflection;

use AnterisDev\FormRequest\Attributes\Validation;
use ReflectionNamedType;
use ReflectionProperty;
use ReflectionUnionType;

class FormRequestReflectionProperty
{
    public function __construct(private ReflectionProperty $property)
    {
        //
    }

    public function allowsNull(): bool
    {
        foreach ($this->getTypes() as $type) {
            if ($type->allowsNull()) {
                return true;
            }
        }

        return false;
    }

    public function getName(): string
    {
        return $this->property->getName();
    }

    public function getTypes(): array
    {
        $type = $this->property->getType();

        if (! $type) {
            return [];
        }

        return match ($type::class) {
            ReflectionNamedType::class => [$type],
            ReflectionUnionType::class => $type->getTypes(),
        };
    }

    public function getValidationRules(): array
    {
        $attributes = $this->property->getAttributes(Validation::class);
        $validationRulesArray = [];

        // Require properties that are not nullable.
        if (! $this->allowsNull()) {
            $validationRulesArray[] = 'required';
        }

        foreach ($attributes as $attribute) {
            $attribute = $attribute->newInstance();

            $validationRulesArray = array_merge_recursive($validationRulesArray, $attribute->rules);
        }

        return $validationRulesArray;
    }
}