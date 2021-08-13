<?php

namespace Anteris\Tests\FormRequest\Support;

use Anteris\FormRequest\Attributes\Rule;
use ReflectionAttribute;
use ReflectionClass;

trait TestsValidationAttributes
{
    /**
     * @psalm-param class-string $class
     */
    public function assertValidationAttribute(string $class): void
    {
        $reflection = new ReflectionClass($class);

        $interfaces = $reflection->getInterfaces();

        $this->assertArrayHasKey(Rule::class, $interfaces);

        $attributes = $reflection->getAttributes();
        $attributeArray = [];

        /** @var ReflectionAttribute $attribute */
        foreach ($attributes as $attribute) {
            $attributeArray[$attribute->getName()] = $attribute->getArguments();
        }

        $this->assertArrayHasKey('Attribute', $attributeArray, "Failed asserting that {$class} is an attribute.");
        $this->assertContains(8, $attributeArray['Attribute'], "Failed asserting that {$class} is a property attribute.");
    }

    public function assertValidationRules(array $expectedRules, Rule $rule): void
    {
        $this->assertSame($expectedRules, $rule->getRules());
    }
}