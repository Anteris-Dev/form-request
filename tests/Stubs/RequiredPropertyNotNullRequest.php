<?php

namespace Anteris\Tests\FormRequest\Stubs;

use Anteris\FormRequest\FormRequestData;

class RequiredPropertyNotNullRequest extends FormRequestData
{
    public string $property;
}
