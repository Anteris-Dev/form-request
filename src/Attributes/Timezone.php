<?php

namespace Anteris\FormRequest\Attributes;

use Attribute;

#[Attribute]
class Timezone extends Rule
{
    public function getRules(): array
    {
        return ['timezone'];
    }
}
