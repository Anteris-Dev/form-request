<?php

namespace Anteris\FormRequest\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class CurrentPassword implements Rule
{
    public function __construct(private ?string $guard = null)
    {
        //
    }

    public function getRules(): array
    {
        if (! is_null($this->guard)) {
            return ['current_password:' . $this->guard];
        }

        return ['current_password'];
    }
}
