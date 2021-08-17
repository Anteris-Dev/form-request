<?php

namespace Anteris\FormRequest;

use Anteris\FormRequest\Reflection\FormRequestDataReflectionClass;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Validation\Factory;
use Illuminate\Http\Request;

abstract class FormRequestData implements Arrayable
{
    private FormRequestDataReflectionClass $reflection;

    final public function __construct(
        private Request $request,
        private Factory $validationFactory
    ) {
        $this->createReflection();
        $this->resolve();
    }

    public function getRequest(): Request
    {
        return $this->request;
    }

    public function except(string ...$keys): array
    {
        return array_diff_key($this->toArray(), array_flip($keys));
    }

    public function only(string ...$keys): array
    {
        return array_intersect_key($this->toArray(), array_flip($keys));
    }

    public function toArray(): array
    {
        $reflection = $this->getReflection();
        $array      = [];

        foreach ($reflection->getProperties() as $property) {
            $array[$property->getName()] = $property->getValue($this);
        }

        return $array;
    }

    private function resolve(): void
    {
        $reflection = $this->getReflection();

        $validated = $this->validationFactory->make(
            $this->request->only($reflection->getPropertyNames()),
            $reflection->getValidationRules()
        )->validate();

        foreach ($validated as $property => $value) {
            $this->{$property} = $value;
        }
    }

    private function createReflection(): void
    {
        $this->reflection = new FormRequestDataReflectionClass($this);
    }

    private function getReflection(): FormRequestDataReflectionClass
    {
        return $this->reflection;
    }
}
