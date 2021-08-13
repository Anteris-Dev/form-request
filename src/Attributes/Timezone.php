<?php

namespace Anteris\FormRequest\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class Timezone implements Rule
{
    public function getRules(): array
    {
        return ['timezone'];
    }
}
