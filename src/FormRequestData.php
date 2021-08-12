<?php

namespace AnterisDev\FormRequest;

use AnterisDev\FormRequest\Reflection\FormRequestReflectionClass;
use Illuminate\Contracts\Validation\Factory;
use Illuminate\Http\Request;

class FormRequestData
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

    private function resolve(): void
    {
        $reflection = new FormRequestReflectionClass($this);

        $validated = $this->validationFactory->make(
            $this->request->only($reflection->getPropertyNames()),
            $reflection->getValidationRules()
        )->validate();

        foreach ($validated as $property => $value) {
            $this->{$property} = $value;
        }
    }
}