<?php

namespace AnterisDev\Tests\FormRequest\Stubs;

use AnterisDev\FormRequest\FormRequestData;

class RequiredPropertyNotNullRequest extends FormRequestData
{
    public string $property;
}