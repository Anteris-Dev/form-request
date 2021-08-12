<?php

namespace Anteris\FormRequest\Attributes;

use Attribute;

#[Attribute]
class Uuid extends Rule
{
    public function getRules(): array
    {
        return ['uuid'];
    }
}