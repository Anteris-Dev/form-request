# [WIP] Request Data

Inspired by a [Twitter](https://twitter.com/brendt_gd/status/1409808574860214276?s=21) thread, this is a stab at making Form Request data transfer objects. This package is currently WIP.

## Creating a Form Request
To create your request with validation rules, simply extend `AnterisDev\FormRequest\FormRequestData` and add your public properties. To specify the validation rules for a property, pass a string of Laravel validation rules to the `AnterisDev\FormRequest\Attributes\Validation` attribute.

> **Note**: Properties that are not nullable are automatically set to required.

For example:

```php
use AnterisDev\FormRequest\Attributes\Validation;
use AnterisDev\FormRequest\FormRequestData;

class CreatePersonRequest
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