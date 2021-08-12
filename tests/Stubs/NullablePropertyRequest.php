<?php

namespace Anteris\Tests\FormRequest\Stubs;

use Anteris\FormRequest\FormRequestData;

class NullablePropertyRequest extends FormRequestData
{
    public ?string $property;
}
