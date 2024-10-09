# LaravelSpinForms

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Build Status][ico-travis]][link-travis]

## Installation

Via Composer

```bash
$ composer require spindogs/laravel-spin-forms
```

Upon install/update, it is recommended to clear the view cache. If there are new components in here, then they will need to either be manually copied over from the spin-forms.php config file, or republish the service provider with the --force flag. _NB: using the --force command will overwrite your config file, so if you have any custom controllers or views, plase change them again_

```bash
php artisan view:clear
```

Some components require additional javascript to be used in conjunction with the FE Baseline, these are generated by the components, but you will need to add code to your layout page to display it.

```php
@stack('scripts')
```

## Components

* Form
* Form Wrap
* Form Fieldset
* _Form Group (Deprecated)_
* Error List
* Button
* Label
* Input
* Textarea
* Checkbox
* Radio
* Select
* Date Picker
* Time Picker
* Date/Time Picker
* Help

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

* __method__ - _string_ - DELETE, GET, HEAD, OPTIONS, PATCH, POST, PUT (Default: _POST_)
* __files__ - _boolean_ (Default: _false_)

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

* __type__ - _string_ - Expected input: button/reset/submit (Default: _submit_)

This takes a slot as the entry for the button content.

```blade
<x-form-button type="submit">
Submit Form
</x-form-button>
```

### Form Wrap

Options

* __field-identifier__ - _string_ - Type of form element that is going to be present (_null_)

This is utilised by all elements as a div wrapper around all of the form element controls. This will display the content inside of it. Field Identifier is generally automatically generated.

```blade
<x-form-wrap field-identifier="__text">
    ...
</x-form-wrap>
```

### Form Fieldset

This element is used to house checkboxes / radio buttons. Fieldset should be used over Group for accessibility. But we are not removing Group for backwards compatability. These elements are identical except for: HTML output, Title is required.

Options

* __name__ - _string_ - Name of inputs to be displayed inside the group, this is needed to correctly style the error (__required__)
* __type__ - _string_ - Either __checkbox__, or __radio__, needed to correctly generate the field identifier of the Form Wrap component. (__required__)
* __title__ - _string_ - Title for group of elements in the group (__required__)
* __required__ - _boolean_ - Adds asterisk next to title (Default:  _false_)
* __show-error__ - _boolean_ - Defines whether or not to display error text under element (Default: _false_)

```blade
<x-form-fieldset name="some-name-for-input" type="radio" title="This is the title of the elements" :required="true">
    ...
</x-form-fieldset>
```


### Form Group (Deprecated)

This element is deprecated, but will still be available for backwards compataibility. This is almost identical to Form Fieldset.

Options

* __name__ - _string_ - Name of inputs to be displayed inside the group, this is needed to correctly style the error (__required__)
* __type__ - _string_ - Either __checkbox__, or __radio__, needed to correctly generate the field identifier of the Form Wrap component. (__required__)
* __title__ - _string_ - Title for group of elements in the group (Default:  _null_)
* __required__ - _boolean_ - Adds asterisk next to title (Default:  _false_)
* __field-wrap__ - _boolean_ - Wraps the input inside the field wrap div/class (Default: _true_)
* __show-error__ - _boolean_ - Defines whether or not to display error text under element (Default: _false_)

```blade
<x-form-group name="some-name-for-input" type="radio" title="This is the title of the elements" :required="true">
    ...
</x-form-group>
```

### Input

Options

* __name__ - _string_ - Name of input (__required__)
* __id__ - _string_ - ID of input, if not given, randomly generated (Default: _null_)
* __label__ - _string_ - Label for input (Default: _null_)
* __type__ - _string_ - Any applicable types available for input, although not recomended for checkbox/radio (Default:  _text_)
* __value__ - _string_ - This is the default value of the element on the page (Default: _null_)
* __required__ - _boolean_ - Adds asterisk next to label, and required tag to input (Default: _false_)
* __readonly__ - _boolean_ - Adds readonly attribute to input (Default:  _false_)
* __field-wrap__ - _boolean_ - Wraps the input inside the field wrap div/class (Default: _true_)
* __show-error__ - _boolean_ - Defines whether or not to display error text under element (Default: _true_)

Also takes all attributes and merges across, like min, max, step etc.

```blade
<x-form-input type="text" label="Text Input" name="text-input" value="Default text input" />
<x-form-input type="number" label="Number Input" name="number-input" value="Default number input" min="1" max="10" />
```

### Textarea

Options

* __name__ - _string_ - Name of textarea (__required__)
* __id__ - _string_ - ID of textarea, if not given, randomly generated (Default: _null_)
* __label__ - _string_ - Label for textarea (Default: _null_)
* __value__ - _string_ - This is the default value of the element on the page (Default: _null_)
* __required__ - _boolean_ - Adds asterisk next to label, and required tag to input (Default: _false_)
* __readonly__ - _boolean_ - Adds readonly attribute to input (Default:  _false_)
* __field-wrap__ - _boolean_ - Wraps the input inside the field wrap div/class (Default: _true_)
* __show-error__ - _boolean_ - Defines whether or not to display error text under element (Default: _true_)

Also takes all attributes and merges across.

```blade
<x-form-textarea label="Textarea" name="textarea-input" value="Lorem Ipsum" />
```

### Checkbox

Options

* __name__ - _string_ - Name of input (__required__)
* __id__ - _string_ - ID of checkbox, if not given, randomly generated (Default: _null_)
* __label__ - _string_ - Label for checkbox, if left as null, this is represented by a &amp;nbsp; (Default: _null_)
* __value__ - _string_ - Value for this checkbox to when selected (Default: _1_)
* __selected__ - _boolean_ - Denotes whether the checkbox should be checked as default (Default: _false_)
* __required__ - _boolean_ - Adds asterisk next to label (Default: _false_)
* __readonly__ - _boolean_ - Adds readonly attribute to input (Default:  _false_)
* __field-wrap__ - _boolean_ - Wraps the input inside the field wrap div/class (Default: _true_)
* __show-error__ - _boolean_ - Defines whether or not to display error text under element (Default: _false_)

It is higly recommended to utilise the Form Group element when using Checkboxes.

```blade
<x-form-group name="sign-up" type="checkbox">
    <x-form-checkbox name="sign-up" label="Sign up to the Newsletter!" />
</x-form-group>

<x-form-group name="checkbox-items" type="checkbox" title="Select some items!">
    <x-form-checkbox name="checkbox-items[item-1]" label="Item 1" :selected="true" />
    <x-form-checkbox name="checkbox-items[item-2]" label="Item 2" />
    <x-form-checkbox name="checkbox-items[item-3]" label="Item 3" />
    <x-form-checkbox name="checkbox-items[item-4]" label="Item 4" />
</x-form-group>
```

### Radio

Options

* __name__ - _string_ - Name of input (__required__)
* __id__ - _string_ - ID of radio button, if not given, randomly generated (Default: _null_)
* __label__ - _string_ - Label for checkbox, if left as null, this is represented by a &amp;nbsp; (Default: _null_)
* __value__ - _string_ - Value for this checkbox to when selected (Default: _null_)
* __selected__ - _boolean_ - Denotes whether the checkbox should be checked as default (Default: _false_)
* __readonly__ - _boolean_ - Adds readonly attribute to input (Default:  _false_)
* __field-wrap__ - _boolean_ - Wraps the input inside the field wrap div/class (Default: _true_)
* __show-error__ - _boolean_ - Defines whether or not to display error text under element (Default: _false_)

It is higly recommended to utilise the Form Group element when using Radio Buttons.

```blade
<x-form-group name="favourite-team" type="radio" title="Select Your Favourite Team!" :required="true">
    <x-form-radio name="favourite-team" label="Arsenal" :selected="true" />
    <x-form-radio name="favourite-team" label="Chelsea" />
    <x-form-radio name="favourite-team" label="Liverpool" />
    <x-form-radio name="favourite-team" label="Man United" />
</x-form-group>
```

### Select

Options

* __name__ - _string_ - Name of select (__required__)
* __id__ - _string_ - ID of select, if not given, randomly generated (Default: _null_)
* __label__ - _string_ - Label for the select (Default: _null_)
* __options__ - _array_ - Key => Array [name, image] array of options for each select. (Default: _[]_)
* __selected__ - _string/array_ - List of keys / single key for default selection on page view. (Default: _null_)
* __required__ - _boolean_ - Adds asterisk next to title (Default: _false_)
* __readonly__ - _boolean_ - Adds readonly attribute to input (Default:  _false_)
* __field-wrap__ - _boolean_ - Wraps the input inside the field wrap div/class (Default: _true_)
* __multiple__ - _boolean_ - Allow multiple selection (Default: _false_)
* __images__ - _boolean_ - Adds images to each option, must be in array to work correctly (Default: _false_)
* __search__ - _boolean_ - Allow searching of dropdown (Default: _true_)
* __show-error__ - _boolean_ - Defines whether or not to display error text under element (Default: _true_)
* __placeholder__ - _string_ - Adds placeholder row to select, add the content for it (Default: _null_, does not work with images)

Currently does not work with optgroup.

Example of $options and $selected
```php
$options = [
    'arsenal' => ['name' => 'Arsenal', 'image' => '/images/badge/arsenal.png'],
    'chelsea' => ['name' => 'Chelsea', 'image' => '/images/badge/chelsea.png'],
    'liverpool' => ['name' => 'Liverpool', 'image' => '/images/badge/liverpool.png'],
    'man-united' => ['name' => 'Manchester United', 'image' => '/images/badge/man-united.png']
];

$selected_singular = 'arsenal';

$selected_multiple = ['arsenal', 'liverpool'];
```

```blade
<x-form-select label="Select" name="select1" :options="$options" :required="true" :selected="$selected" placeholder="Select a Team" />

<x-form-select label="Select - no search" name="select2" :options="$options" :required="true" :selected="$selected" :search="false" placeholder="Select a Team"  />

<x-form-select label="Select - images" name="select3" :options="$options" :required="true" :selected="$selected" :images="true" />

<x-form-select label="Select - multiselect" name="select4[]" :options="$options" placeholder="Select a Team" :multiple="true"/>

<x-form-select label="Select - multiselect" name="select5[]" :options="$options" :required="true" :selected="$selected_multiple" :multiple="true" :images="true" placeholder="Select a Team" />
```

### Date Picker

Options

* __name__ - _string_ - Name of input (__required__)
* __id__ - _string_ - ID of input, if not given, randomly generated (Default: _null_)
* __label__ - _string_ - Label for input (Default: _null_)
* __value__ - _string_ - This is the default value of the element on the page. Must be in format Y-m-d, otherwise will not render the default date (Default: _null_)
* __required__ - _boolean_ - Adds asterisk next to title (Default: _false_)
* __field-wrap__ - _boolean_ - Wraps the input inside the field wrap div/class (Default: _true_)
* __show-error__ - _boolean_ - Defines whether or not to display error text under element (Default: _true_)

```blade
<x-form-date-picker label="Date Picker" name="date-picker" default="2020-12-01" />
```

### Date and Time Picker

Options

* __name__ - _string_ - Name of input (__required__)
* __id__ - _string_ - ID of input, if not given, randomly generated (Default: _null_)
* __label__ - _string_ - Label for input (Default: _null_)
* __value__ - _string_ - This is the default value of the element on the page. Must be in format Y-m-d H:i, otherwise will not render the default date/time (Default: _null_)
* __required__ - _boolean_ - Adds asterisk next to title (Default: _false_)
* __field-wrap__ - _boolean_ - Wraps the input inside the field wrap div/class (Default: _true_)
* __show-error__ - _boolean_ - Defines whether or not to display error text under element (Default: _true_)

```blade
<x-form-date-time-picker label="Date/Time Picker" name="date-time-picker" default="2020-12-01 13:44" />
```

### Time Picker

Options

* __name__ - _string_ - Name of input (__required__)
* __id__ - _string_ - ID of input, if not given, randomly generated (Default: _null_)
* __label__ - _string_ - Label for input (Default: _null_)
* __value__ - _string_ - This is the default value of the element on the page. Must be in format H:i, otherwise will not render the default time. Regex to verify (Default: _null_)
* __required__ - _boolean_ - Adds asterisk next to title (Default: _false_)
* __field-wrap__ - _boolean_ - Wraps the input inside the field wrap div/class (Default: _true_)
* __show-error__ - _boolean_ - Defines whether or not to display error text under element (Default: _true_)

```blade
<x-form-time-picker label="Time Picker" name="time-picker" value="12:34" />
```

### Help

You can also add help text, beofre and/or after the input elemtn with the use of the slots `pre_help` and `post_help`

```blade
<x-form-input type="text" id="adam" name="text-input">
    @slot('pre_help')
        Some help text before the form element
    @endslot
    @slot('post_help')
        Some help text after the form element
    @endslot
</x-form-input>
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

## Supported Versions

Versions will be supported for a limited amount of time.

| Version | Laravel Version |
| ---- | ---- |
| 1 | 7/8 |
| 2 | 7/8/9 |
| 3 | 10 |
| 4 | 11 |