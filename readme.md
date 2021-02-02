# LaravelSpinForms

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Build Status][ico-travis]][link-travis]

## Installation

Via Composer

``` bash
$ composer require spindogs/laravel-spin-forms
```

## Components

* Form
* Error List
* Button
* Input
* Textarea
* Checkbox
* Radio
* Select
* Date Picker
* Time Picker
* Date/Time Picker

## Modification

You can modify/override any of the templates, by changing the view and class keys in the config file. To do this, you need to publish the vendor file.

```bash
php artisan vendor:publish --provider="Spindogs\LaravelSpinForms\SpinFormsServiceProvider"
```

```php
return [
    'components' => [
        'form' => [
            'view'  => 'spin-forms::components.form', // DEFAULT
            'view'  => 'components.spin-forms.form', // OVERRIDE
            'class' => \Spindogs\LaravelSpinForms\View\Components\Form::class
        ],
    ]
]
```

## Examples

### Form

Options

* __method__ - _string_ - DELETE, GET, HEAD, OPTIONS, PATCH, POST, PUT (defaults to __POST__)
* __files__ - _boolean_ (defaults to __false__)

DELETE, PATCH, PUT; will trigger the Laravel @method command to then spoof the verb.

The files variable, will add the enctype/multipart to the form tag. This needs to be sent as a boolean value, so needs to be in the component as :files="true"


```blade
<x-form method="POST" :files="true">
</x-form>
```

### Error List

Displays all form errors in list.

```blade
<x-form-error-list />
```

### Button

Options

* __type__ - _string_ - Expected input: button/reset/submit (defaults to __submit__)

This takes a slot as the entry for the button content.

```blade
<x-button type="submit">
Submit Form
</x-button>
```

### Input

Options

* __name__ - _string_ - Name of input (required)
* __label__ - _string_ - Label for input (defaults to __''__)
* __type__ - _string_ - Any applicable types available for input, although not recomended for checkbox/radio (defaults to _text_)
* __default__ - _string_ - This is the starting value of the element on the page (defaults to __null__)
* __required__ - _boolean_ - Adds asterisk next to label, and required tag to input (defaults to false)
* __show-error__ - _boolean_ - Defines whether or not to display error text under element (defaults to __true__)

Also takes all attributes and merges across, like min, max, step etc.

```blade
<x-form-input type="text" label="Text Input" name="text-input" default="Default text input" />
<x-form-input type="number" label="Number Input" name="number-input" default="Default number input" min="1" max="10" />
```

### Textarea

Options

* __name__ - _string_ - Name of input (required)
* __label__ - _string_ - Label for textarea (defaults to __''__)
* __default__ - _string_ - This is the starting value of the element on the page (defaults to __null__)
* __required__ - _boolean_ - Adds asterisk next to label, and required tag to input (defaults to false)
* __show-error__ - _boolean_ - Defines whether or not to display error text under element (defaults to __true__)

```blade
<x-form-textarea label="Textarea" name="textarea-input" default="default_value" />
```

### Checkbox

Options

* __name__ - _string_ - Name of input (required)
* __options__ - _array_ - Key => Value array of options for each checkbox. (defaults to __[]__)
* __title__ - _string_ - Title for group of checkboxes (defaults to __''__)
* __default__ - _string/array_ - List of keys / single key for default selection on page view. (defaults to __null__)
* __required__ - _boolean_ - Adds asterisk next to title (defaults to false)
* __show-error__ - _boolean_ - Defines whether or not to display error text under element (defaults to __true__)

```blade
<x-form-checkbox title="Checkbox Options" name="checkbox[]" :options="$options" :default="$default_selected" />
```

### Radio

Options

* __name__ - _string_ - Name of input (required)
* __options__ - _array_ - Key => Value array of options for each radio. (defaults to __[]__)
* __title__ - _string_ - Title for group of radios (defaults to __''__)
* __default__ - _string/array_ - List of keys / single key for default selection on page view. (defaults to __null__)
* __required__ - _boolean_ - Adds asterisk next to title (defaults to false)
* __show-error__ - _boolean_ - Defines whether or not to display error text under element (defaults to __true__)

```blade
<x-form-radio title="Radio Options" name="radio" :options="$options" :default="$default_selected" />
```

### Select

Options

* __name__ - _string_ - Name of input (required)
* __label__ - _string_ - Label for the select (defaults to __''__)
* __options__ - _array_ - Key => Array (name, image rows) array of options for each select. (defaults to __[]__)
* __default__ - _string/array_ - List of keys / single key for default selection on page view. (defaults to __null__)
* __required__ - _boolean_ - Adds asterisk next to title (defaults to false)
* __multiple__ - _boolean_ - Allow multiple selection (defaults to false)
* __images__ - _boolean_ - Adds images to each option, must be in array to work correctly (defaults to false)
* __search__ - _boolean_ - Allow searching of dropdown (defaults to true)
* __show-error__ - _boolean_ - Defines whether or not to display error text under element (defaults to __true__)
* __placeholder__ - _string_ - Adds placeholder row to select, add the content for it (defaults to _null_, does not work with images)

Currently does not work with optgroup.

Example of $options and $selected
```php
$options = [
    'arsenal' => ['name' => 'Arsenal', 'image' => '/images/badge/arsenal.png']
    'liverpool' => ['name' => 'Liverpool', 'image' => '/images/badge/liverpool.png']
    'newcastle' => ['name' => 'Newcastle', 'image' => '/images/badge/newcastle.png']
];

$selected_singular = 'arsenal';

$selected_multiple = ['arsenal', 'liverpool'];
```

```blade
<x-form-select label="Select" name="select1" :options="$options" :required="true" :default="$selected" placeholder="Select a Team" />

<x-form-select label="Select - no search" name="select2" :options="$options" :required="true" :default="$selected" :search="false" placeholder="Select a Team"  />

<x-form-select label="Select - images" name="select3" :options="$options" :required="true" :default="$selected" :images="true" />

<x-form-select label="Select - multiselect" name="select4[]" :options="$options" placeholder="Select a Team" :multiple="true"/>

<x-form-select label="Select - multiselect" name="select5[]" :options="$options" :required="true" :default="$selected" :multiple="true" :images="true" placeholder="Select a Team" />
```

### Date Picker

Options

* __name__ - _string_ - Name of input (required)
* __label__ - _string_ - Label for input (defaults to __''__)
* __default__ - _string/array_ - This is the starting value of the element on the page. Must be in format Y-m-d, otherwise will not render the default date (defaults to __null__)
* __required__ - _boolean_ - Adds asterisk next to title (defaults to __false__)
* __show-error__ - _boolean_ - Defines whether or not to display error text under element (defaults to __true__)

```blade
<x-form-date-picker label="Date Picker" name="date-picker" default="2020-12-01" />
```

### Date and Time Picker

Options

* __name__ - _string_ - Name of input (required)
* __label__ - _string_ - Label for input (defaults to __''__)
* __default__ - _string/array_ - This is the starting value of the element on the page. Must be in format Y-m-d H:i, otherwise will not render the default date/time (defaults to __null__)
* __required__ - _boolean_ - Adds asterisk next to title (defaults to __false__)
* __show-error__ - _boolean_ - Defines whether or not to display error text under element (defaults to __true__)

```blade
<x-form-date-time-picker label="Date/Time Picker" name="date-time-picker" default="2020-12-01 13:44" />
```

### Time Picker

Options

* __name__ - _string_ - Name of input (required)
* __label__ - _string_ - Label for input (defaults to __''__)
* __default__ - _string/array_ - This is the starting value of the element on the page. Must be in format H:i, otherwise will not render the default time. Regex to verify (defaults to __null__)
* __required__ - _boolean_ - Adds asterisk next to title (defaults to __false__)
* __show-error__ - _boolean_ - Defines whether or not to display error text under element (defaults to __true__)

```blade
<x-form-time-picker label="Time Picker" name="time-picker" default="12:34" />
```

## Change log

Please see the [changelog](changelog.md) for more information on what has changed recently.

## Contributing

Please see [contributing.md](contributing.md) for details and a todolist.

## Security

If you discover any security related issues, please email achapman@spindogs.com instead of using the issue tracker.

## Credits

- [Adam Chapman][link-author]
- [All Contributors][link-contributors]

## License

MIT. Please see the [license file](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/spindogs/laravel-spin-forms.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/spindogs/laravel-spin-forms.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/spindogs/laravel-spin-forms/master.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/spindogs/laravel-spin-forms
[link-downloads]: https://packagist.org/packages/spindogs/laravel-spin-forms
[link-travis]: https://travis-ci.org/spindogs/laravel-spin-forms
[link-author]: https://github.com/spindogs
[link-contributors]: ../../contributors
