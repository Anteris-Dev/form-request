<?php

namespace Anteris\FormRequest\Attributes;

use Attribute;

/**
 * Allows the validator to stop on the first failure.
 *
 * @todo implement stop on first failure
 */
#[Attribute(Attribute::TARGET_CLASS)]
class StopOnFirstFailure
{
}
