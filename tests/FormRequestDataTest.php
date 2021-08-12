<?php

namespace AnterisDev\Tests\FormRequest;

use AnterisDev\Tests\FormRequest\Stubs\CreatePersonRequest;
use AnterisDev\Tests\FormRequest\Stubs\NullablePropertyRequest;
use AnterisDev\Tests\FormRequest\Stubs\RequiredPropertyNotNullRequest;
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