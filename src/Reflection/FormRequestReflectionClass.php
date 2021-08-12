<?php

namespace AnterisDev\FormRequest\Reflection;

use AnterisDev\FormRequest\FormRequestData;
use Illuminate\Support\Collection;
use ReflectionClass;
use ReflectionProperty;

class FormRequestReflectionClass
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
            fn($property) => new FormRequestReflectionProperty($property),
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

        foreach ($this->getProperties() as $property) {
            $array[$property->getName()] = $property->getValidationRules();
        }

        return $array;
    }
}