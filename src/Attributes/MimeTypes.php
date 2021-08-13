<?php

namespace Anteris\FormRequest\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class MimeTypes implements Rule
{
    private array $mimeTypes;

    public function __construct(string ...$mimeTypes)
    {
        $this->mimeTypes = $mimeTypes;
    }

    public function getRules(): array
    {
        return ['mimetypes:' . implode(',', $this->mimeTypes)];
    }
}