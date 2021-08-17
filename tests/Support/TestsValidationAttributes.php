<?php

namespace Anteris\Tests\FormRequest\Support;

use Anteris\FormRequest\Attributes\Rule;
use PHPUnit\Framework\Assert;
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

        Assert::arrayHasKey(Rule::class, $interfaces);

        $attributes     = $reflection->getAttributes();
        $attributeArray = [];

        /** @var ReflectionAttribute $attribute */
        foreach ($attributes as $attribute) {
            $attributeArray[$attribute->getName()] = $attribute->getArguments();
        }

        Assert::arrayHasKey('Attribute', $attributeArray, "Failed asserting that {$class} is an attribute.");
        Assert::assertContains(8, $attributeArray['Attribute'], "Failed asserting that {$class} is a property attribute.");
    }

    public function assertValidationRules(array $expectedRules, Rule $rule): void
    {
        Assert::assertEqualsCanonicalizing($expectedRules, $rule->getRules());
    }

    public function assertValidationRulesNot(array $unexpectedRules, Rule $rule): void
    {
        Assert::assertNotEqualsCanonicalizing($unexpectedRules, $rule->getRules());
    }
}
