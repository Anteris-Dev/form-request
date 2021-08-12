# [WIP] Form Request

Inspired by a [Twitter](https://twitter.com/brendt_gd/status/1409808574860214276?s=21) thread, this is a stab at making Form Request data transfer objects. This package is currently WIP.

## Creating a Form Request
To create your request with validation rules, simply extend `AnterisDev\FormRequest\FormRequestData` and add your public properties. To specify the validation rules for a property, pass a string of Laravel validation rules to the `AnterisDev\FormRequest\Attributes\Validation` attribute.

> **Note**: Properties that are not nullable are automatically set to required.

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
    #[Validation(['string', 'max:255'])]
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

- `Anteris\FormRequest\Attributes\Email`
- `Anteris\FormRequest\Attributes\Exists`
- `Anteris\FormRequest\Attributes\In`
- `Anteris\FormRequest\Attributes\NotIn`
- `Anteris\FormRequest\Attributes\Same`
- `Anteris\FormRequest\Attributes\Size`
- `Anteris\FormRequest\Attributes\StartsWith`
- `Anteris\FormRequest\Attributes\Timezone`
- `Anteris\FormRequest\Attributes\Url`
- `Anteris\FormRequest\Attributes\Uuid`

To create your own validation attribute, simply extend `Anteris\FormRequest\Attributes\Rule` and provide the correct output to the `getRules()` method.

### Email Validation
Do to several options available to the Email validator, the Email validation attribute accepts several flags. These are:

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