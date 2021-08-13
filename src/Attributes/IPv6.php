<?php

namespace Anteris\FormRequest\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class IPv6 implements Rule
{
    public function getRules(): array
    {
        return ['ipv6'];
    }
}