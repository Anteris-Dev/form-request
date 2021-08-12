<?php

namespace Anteris\FormRequest\Attributes;

use Attribute;

#[Attribute]
class Url extends Rule
{
    public function getRules(): array
    {
        return ['url'];
    }
}