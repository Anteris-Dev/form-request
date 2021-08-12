<?php

namespace Anteris\FormRequest\Attributes;

abstract class Rule
{
    abstract public function getRules(): array;
}