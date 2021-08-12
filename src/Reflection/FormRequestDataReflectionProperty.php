<?php

namespace Anteris\FormRequest\Reflection;

use Anteris\FormRequest\Attributes\Rule;
use ReflectionProperty;
use ReflectionUnionType;

class FormRequestDataReflectionProperty
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

        if ($type instanceof ReflectionUnionType) {
            return $type->getTypes();
        }

        return [ $type ];
    }

    public function hasType(string $type): bool
    {
        $typeNames = array_map(fn ($type): string => $type->getName(), $this->getTypes());

        return in_array($type, $typeNames);
    }

    public function getValidationAttributes(): array
    {
        $attributes           = $this->property->getAttributes();
        $validationAttributes = [];

        foreach ($attributes as $attribute) {
            if (! is_subclass_of($attribute->getName(), Rule::class)) {
                continue;
            }

            $validationAttributes[] = $attribute;
        }

        return $validationAttributes;
    }

    public function getValidationRules(): array
    {
        $attributes           = $this->getValidationAttributes();
        $validationRulesArray = $this->createDefaultValidationRules();

        foreach ($attributes as $attribute) {
            $attribute = $attribute->newInstance();

            $validationRulesArray = array_merge_recursive($validationRulesArray, $attribute->getRules());
        }

        return $validationRulesArray;
    }

    public function getValue(object $object): mixed
    {
        return $this->property->getValue($object);
    }

    protected function createDefaultValidationRules(): array
    {
        $rules = [];

        if (! $this->allowsNull()) {
            $rules[] = 'required';
        }

        if ($this->hasType('string')) {
            $rules[] = 'string';
        }

        if ($this->hasType('int')) {
            $rules[] = 'int';
        }

        if ($this->hasType('float')) {
            $rules[] = 'numeric';
        }

        if ($this->hasType('array')) {
            $rules[] = 'array';
        }

        if ($this->hasType('bool')) {
            $rules[] = 'boolean';
        }

        return $rules;
    }
}
