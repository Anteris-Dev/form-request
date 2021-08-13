<?php

namespace Anteris\FormRequest\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class IPv4 implements Rule
{
    public function getRules(): array
    {
        return ['ipv4'];
    }
}