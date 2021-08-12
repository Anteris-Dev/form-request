<?php

namespace Anteris\Tests\FormRequest;

use Anteris\Tests\FormRequest\Stubs\AttributesRequest;
use Anteris\Tests\FormRequest\Stubs\CreatePersonRequest;
use Anteris\Tests\FormRequest\Stubs\NullablePropertyRequest;
use Anteris\Tests\FormRequest\Stubs\RequiredPropertyNotNullRequest;
use Anteris\Tests\FormRequest\Stubs\TypeSpecificRequest;
use Illuminate\Http\Request;
use Illuminate\Translation\ArrayLoader;
use Illuminate\Translation\Translator;
use Illuminate\Validation\Factory;
use Illuminate\Validation\ValidationException;
use PHPUnit\Framework\TestCase;

class FormRequestDataTest extends TestCase
{
    public function test_it_can_set_properties_when_valid()
    {
        $personRequest = new CreatePersonRequest(
            $this->createRequest([
                'first_name' => 'Aidan',
                'last_name' => 'Casey',
                'email' => 'aidan.casey@example.com',
            ]),
            $this->createValidationFactory()
        );

        $this->assertSame('Aidan', $personRequest->first_name);
        $this->assertSame('Casey', $personRequest->last_name);
        $this->assertSame('aidan.casey@example.com', $personRequest->email);
        $this->assertInstanceOf(Request::class, $personRequest->getRequest());
    }

    public function test_it_throws_exceptions_when_validation_fails()
    {
        $this->expectException(ValidationException::class);

        new CreatePersonRequest(
            $this->createRequest([
                'email' => 'no',
            ]),
            $this->createValidationFactory()
        );
    }

    public function test_it_throws_exception_when_non_nullable_property_missing()
    {
        $this->expectException(ValidationException::class);

        new RequiredPropertyNotNullRequest(
            $this->createRequest(),
            $this->createValidationFactory()
        );
    }

    public function test_it_does_not_throw_exception_when_non_nullable_property_present()
    {
        $request = new RequiredPropertyNotNullRequest(
            $this->createRequest([
                'property' => 'Hi!',
            ]),
            $this->createValidationFactory()
        );

        $this->assertSame('Hi!', $request->property);
    }

    public function test_it_does_not_require_nullable_property()
    {
        $request = new NullablePropertyRequest(
            $this->createRequest(),
            $this->createValidationFactory()
        );

        $this->assertFalse(isset($request->property));
    }

    public function test_validation_with_attribute_validators()
    {
        $request = new AttributesRequest(
            $this->createRequest([
                'first_name' => 'Steven',
                'age' => 100,
                'email' => 'steven@example.com',
                'email_confirmation' => 'steven@example.com',
            ]),
            $this->createValidationFactory()
        );

        $this->assertSame('Steven', $request->first_name);
        $this->assertSame(100, $request->age);
        $this->assertSame('steven@example.com', $request->email);
        $this->assertSame('steven@example.com', $request->email_confirmation);
    }

    public function test_invalid_validation_with_attribute_validators()
    {
        $this->expectException(ValidationException::class);
        
        new AttributesRequest(
            $this->createRequest([
                'first_name' => 'Aidan',
                'age' => 100,
                'email' => 'steven@example.com',
                'email_confirmation' => 'steven@example.com',
            ]),
            $this->createValidationFactory()
        );
    }

    public function test_to_array()
    {
        $request = new CreatePersonRequest(
            $this->createRequest([
                'first_name' => 'Larry',
                'last_name' => 'Johnson',
                'email' => 'larry.johnson@example.com',
            ]),
            $this->createValidationFactory()
        );

        $this->assertSame(
            [
                'first_name' => 'Larry',
                'last_name' => 'Johnson',
                'email' => 'larry.johnson@example.com',
            ],
            $request->toArray()
        );
    }

    public function test_only()
    {
        $request = new CreatePersonRequest(
            $this->createRequest([
                'first_name' => 'Larry',
                'last_name' => 'Johnson',
                'email' => 'larry.johnson@example.com',
            ]),
            $this->createValidationFactory()
        );

        $this->assertSame(
            ['first_name' => 'Larry'],
            $request->only('first_name')
        );

        $this->assertSame(
            ['last_name' => 'Johnson',],
            $request->only('last_name')
        );

        $this->assertSame(
            ['email' => 'larry.johnson@example.com',],
            $request->only('email')
        );
    }

    public function test_except()
    {
        $request = new CreatePersonRequest(
            $this->createRequest([
                'first_name' => 'Larry',
                'last_name' => 'Johnson',
                'email' => 'larry.johnson@example.com',
            ]),
            $this->createValidationFactory()
        );

        $this->assertSame(
            ['first_name' => 'Larry'],
            $request->except('last_name', 'email')
        );

        $this->assertSame(
            ['last_name' => 'Johnson',],
            $request->except('first_name', 'email')
        );

        $this->assertSame(
            ['last_name' => 'Johnson', 'email' => 'larry.johnson@example.com',],
            $request->except('first_name')
        );
    }

    private function createRequest(array $data = []): Request
    {
        return Request::create('/', 'GET', $data);
    }

    private function createValidationFactory(): Factory
    {
        return new Factory(
            new Translator(
                new ArrayLoader(),
                'en'
            )
        );
    }
}