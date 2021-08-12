<?php

namespace AnterisDev\Tests\FormRequest\Stubs;

use AnterisDev\FormRequest\FormRequestData;

class NullablePropertyRequest extends FormRequestData
{
    public ?string $property;
}