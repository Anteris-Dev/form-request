<?php

namespace Anteris\FormRequest\Reflection;

use Anteris\FormRequest\FormRequestData;
use Illuminate\Support\Collection;
use ReflectionClass;
use ReflectionProperty;

class FormRequestDataReflectionClass
{
    private FormRequestData $formRequest;

    private ReflectionClass $formRequestReflection;

    public function __construct(FormRequestData $formRequest)
    {
        $this->formRequest = $formRequest;
        $this->formRequestReflection = new ReflectionClass($formRequest);
    }

    public function getProperties(): array
    {
        $publicProperties = array_filter(
            $this->formRequestReflection->getProperties(
                ReflectionProperty::IS_PUBLIC
            ),
            fn($property) => ! $property->isStatic()
        );

        return array_map(
            fn($property) => new FormRequestDataReflectionProperty($property),
            $publicProperties
        );
    }

    public function getPropertyNames(): array
    {
        return array_map(
            fn($property) => $property->getName(),
            $this->getProperties()
        );
    }

    public function getValidationRules(): array
    {
        $array = [];

        /** @var FormRequestDataReflectionProperty $property */
        foreach ($this->getProperties() as $property) {
            $array[$property->getName()] = $property->getValidationRules();
        }

        return $array;
    }
}