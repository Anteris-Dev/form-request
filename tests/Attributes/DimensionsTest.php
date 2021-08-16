<?php

namespace Anteris\Tests\FormRequest\Attributes;

use Anteris\FormRequest\Attributes\Dimensions;
use Anteris\Tests\FormRequest\Support\TestsValidationAttributes;
use LogicException;
use PHPUnit\Framework\TestCase;

class DimensionsTest extends TestCase
{
    use TestsValidationAttributes;

    public function test_it_is_a_validation_attribute()
    {
        $this->assertValidationAttribute(Dimensions::class);
    }

    public function test_it_throws_exception_when_no_options_are_passed(): void
    {
        $this->expectException(LogicException::class);
        $this->expectExceptionMessage(
            '[Anteris\\FormRequest\\Attributes\\Dimensions] You must specify one of minWidth, minHeight, maxWidth, maxHeight, or ratio.'
        );

        $dimensions = new Dimensions();
        $dimensions->getRules();
    }

    public function test_it_returns_correct_rules_when_all_options_are_passed(): void
    {
        $this->assertValidationRules(
            [
                'dimensions:min_width=100,min_height=100,max_width=500,max_height=500,ratio=3/2'
            ],
            new Dimensions(
                minWidth: 100,
                minHeight: 100,
                maxWidth: 500,
                maxHeight: 500,
                ratio: '3/2'
            )
        );
    }

    public function test_it_returns_correct_rules_when_some_options_are_passed(): void
    {
        $this->assertValidationRules(
            ['dimensions:min_width=100,max_width=1000'],
            new Dimensions(
                minWidth: 100,
                maxWidth: 1000
            )
        );

        $this->assertValidationRules(
            ['dimensions:ratio=1.5'],
            new Dimensions(ratio: 1.5)
        );

        $this->assertValidationRules(
            ['dimensions:max_height=1500'],
            new Dimensions(maxHeight: 1500)
        );
    }
}