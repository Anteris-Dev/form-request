<?php

namespace Anteris\FormRequest;

use Anteris\FormRequest\Reflection\FormRequestDataReflectionClass;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Validation\Factory;
use Illuminate\Http\Request;

class FormRequestData implements Arrayable
{
    final public function __construct(
        private Request $request,
        private Factory $validationFactory
    ) {
        $this->resolve();
    }

    public function getRequest(): Request
    {
        return $this->request;
    }

    public function except($keys): array
    {
        $keys = is_array($keys) ? $keys : func_get_args();

        return array_diff_key(
            $this->toArray(),
            array_flip($keys)
        );
    }

    public function only($keys): array
    {
        $keys = is_array($keys) ? $keys : func_get_args();

        return array_intersect_key(
            $this->toArray(),
            array_flip($keys)
        );
    }

    public function toArray(): array
    {
        $reflection = new FormRequestDataReflectionClass($this);
        $array = [];

        foreach ($reflection->getProperties() as $property) {
            $array[$property->getName()] = $property->getValue($this);
        }

        return $array;
    }

    private function resolve(): void
    {
        $reflection = new FormRequestDataReflectionClass($this);

        $validated = $this->validationFactory->make(
            $this->request->only($reflection->getPropertyNames()),
            $reflection->getValidationRules()
        )->validate();

        foreach ($validated as $property => $value) {
            $this->{$property} = $value;
        }
    }
}