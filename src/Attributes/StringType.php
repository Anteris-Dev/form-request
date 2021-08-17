<?php

namespace Anteris\FormRequest\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class StringType implements Rule
{
    public function getRules(): array
    {
        return ['string'];
    }
}