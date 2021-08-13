<?php

namespace Anteris\FormRequest\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class Bail implements Rule
{
    public function getRules(): array
    {
        return ['bail'];
    }
}
