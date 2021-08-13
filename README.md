# [WIP] Form Request

[![Tests](https://github.com/Anteris-Dev/form-request/actions/workflows/tests.yaml/badge.svg)](https://github.com/Anteris-Dev/form-request/actions/workflows/tests.yaml)
[![Style](https://github.com/Anteris-Dev/form-request/actions/workflows/style.yaml/badge.svg)](https://github.com/Anteris-Dev/form-request/actions/workflows/style.yaml)

Inspired by a [Twitter](https://twitter.com/brendt_gd/status/1409808574860214276?s=21) thread, this is a stab at making Form Request data transfer objects. This package is currently WIP.

## Creating a Form Request
To create your request with validation rules, simply extend `AnterisDev\FormRequest\FormRequestData` and add your public properties. To specify the validation rules for a property, pass a string of Laravel validation rules to the `AnterisDev\FormRequest\Attributes\Validation` attribute.

> **Note**: This package intelligently adds rules like "required" when a property is not nullable and handles adding rules for default PHP types such as "string" for properties that are type hinted as a `string`.

For example:

```php
use AnterisDev\FormRequest\Attributes\Validation;
use AnterisDev\FormRequest\FormRequestData;

class CreatePersonRequest extends FormRequestData
{
    #[Validation('required', 'string', 'max:255')]
    public string $first_name;
    
    #[Validation('required|string|max:255')]
    public string $last_name;
    
    // This property is still required because it is not nullable.
    // This property will also be validated as a string since it has that type. 
    #[Validation('max:255')]
    public string $email;
}
```

Then specify this request in your controller method:

```php
public function store(CreatePersonRequest $request)
{
    die('Hello ' . $request->first_name . ' ' . $request->last_name);
}
```

## [WIP] Validation Attributes
To assist with building your validation rules, various attributes are available. These attributes have typed parameters so that it is easy to see their available options.

The following attributes currently exist:

- `Anteris\FormRequest\Attributes\Accepted`
- `Anteris\FormRequest\Attributes\AcceptedIf`
- `Anteris\FormRequest\Attributes\ActiveUrl`
- `Anteris\FormRequest\Attributes\After`
- `Anteris\FormRequest\Attributes\AfterOrEqual`
- `Anteris\FormRequest\Attributes\Alpha`
- `Anteris\FormRequest\Attributes\AlphaNumeric`
- `Anteris\FormRequest\Attributes\AlphaNumericDash`
- `Anteris\FormRequest\Attributes\Bail`
- `Anteris\FormRequest\Attributes\Before`
- `Anteris\FormRequest\Attributes\BeforeOrEqual`
- `Anteris\FormRequest\Attributes\Between`
- `Anteris\FormRequest\Attributes\Boolean`
- `Anteris\FormRequest\Attributes\Confirmed`
- `Anteris\FormRequest\Attributes\CurrentPassword`
- `Anteris\FormRequest\Attributes\Date`
- `Anteris\FormRequest\Attributes\DateEquals`
- `Anteris\FormRequest\Attributes\DateFormat`
- `Anteris\FormRequest\Attributes\Different`
- `Anteris\FormRequest\Attributes\Digits`
- `Anteris\FormRequest\Attributes\DigitsBetween`
- `Anteris\FormRequest\Attributes\Email`
- `Anteris\FormRequest\Attributes\EndsWith`
- `Anteris\FormRequest\Attributes\Exists`
- `Anteris\FormRequest\Attributes\File`
- `Anteris\FormRequest\Attributes\Filled`
- `Anteris\FormRequest\Attributes\GreaterThan`
- `Anteris\FormRequest\Attributes\GreaterThanOrEqualTo`
- `Anteris\FormRequest\Attributes\Image`
- `Anteris\FormRequest\Attributes\In`
- `Anteris\FormRequest\Attributes\Integer`
- `Anteris\FormRequest\Attributes\IP`
- `Anteris\FormRequest\Attributes\IPv4`
- `Anteris\FormRequest\Attributes\IPv6`
- `Anteris\FormRequest\Attributes\Json`
- `Anteris\FormRequest\Attributes\LessThan`
- `Anteris\FormRequest\Attributes\LessThanOrEqualTo`
- `Anteris\FormRequest\Attributes\Max`
- `Anteris\FormRequest\Attributes\Mimes`
- `Anteris\FormRequest\Attributes\MimeTypes`
- `Anteris\FormRequest\Attributes\Min`
- `Anteris\FormRequest\Attributes\MultipleOf`
- `Anteris\FormRequest\Attributes\NotIn`
- `Anteris\FormRequest\Attributes\NotRegex`
- `Anteris\FormRequest\Attributes\Nullable`
- `Anteris\FormRequest\Attributes\Numeric`
- `Anteris\FormRequest\Attributes\Regex`
- `Anteris\FormRequest\Attributes\Same`
- `Anteris\FormRequest\Attributes\Size`
- `Anteris\FormRequest\Attributes\StartsWith`
- `Anteris\FormRequest\Attributes\Timezone`
- `Anteris\FormRequest\Attributes\Url`
- `Anteris\FormRequest\Attributes\Uuid`

To create your own validation attribute, simply extend `Anteris\FormRequest\Attributes\Rule` and provide the correct output to the `getRules()` method.

### Email Validation
Due to several options available to the Email validator, the Email validation attribute accepts several flags. These are:

- `Email::RfcValidation`
- `Email::NoRfcWarningsValidation`
- `Email::DnsCheckValidation`
- `Email::SpoofCheckValidation`
- `Email:FilterEmailValidation`

By default, the mode is set to `Email::RfcValidation`.

See an example of this usage below:

```php
class ContactInformation extends FormRequestData
{
    #[Email]
    public string $email;
    
    #[Email(Email::DnsCheckValidation | Email::SpoofCheckValidation)]
    public string $email_2;
}
```