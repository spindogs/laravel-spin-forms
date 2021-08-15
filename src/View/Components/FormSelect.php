<?php

namespace Spindogs\LaravelSpinForms\View\Components;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class FormSelect extends FormElement
{
    public $field_wrap;
    public $images;
    public $js_callback;
    public $js_options;
    public $label;
    public $multiple;
    public $name;
    public $options;
    public $placeholder;
    public $required;
    public $selected;
    public $show_error;
    public $type;

    public function __construct(
        string $name,
        string $id = null,
        string $label = null,
        array $options = [],
        $selected = null,
        bool $required = false,
        bool $fieldWrap = true,
        bool $multiple = false,
        bool $images = false,
        bool $search = true,
        bool $showError = true,
        $placeholder = null
    ) {
        $this->name         = $name;
        $this->id           = $id;
        $this->label        = $label ?? $name;
        $this->images       = $images;
        $this->required     = $required;
        $this->multiple     = $multiple;
        $this->placeholder  = $placeholder;
        $this->show_error   = $showError;
        $this->field_wrap   = $fieldWrap;

        // Create the array to send to View for key, name, image
        $this->options = [];

        foreach ($options as $k => $v) {
            $image  = null;
            $value  = null;

            if (is_array($v)) {
                if (array_key_exists('name', $v)) {
                    $value = $v['name'];
                }
                if (array_key_exists('image', $v)) {
                    $image = $v['image'];
                }
            } else {
                $value = $v;
            }

            $this->options[] = [
                'image' => $image,
                'key'   => $k,
                'value' => $value
            ];
        }

        // Generate the JSON for the javascript options
        $this->type = ['__select'];
        $this->js_options = [
            'containerCssClass: "select2-css"',
            'dropdownParent: $("#' . $this->id() . '").parent()'
        ];

        if ($placeholder) {
            $this->js_options[] = 'placeholder: "' . $placeholder . '"';
        }

        if ($multiple) {
            $this->type[] = '__multiselect';
            $this->js_options[] = 'multiple: true';
        }

        if (!$search) {
            $this->type[] = '__nosearch';
            $this->js_options[] = 'minimumResultsForSearch: Infinity';
        }

        if ($images) {
            $this->type[] = '__withimages';
            $this->js_callback = 'function ID_' . $this->id() . 'WithImage(select) { return $(\'<span class="select2-template-image"><img src="\' + $(select.element).data(\'image\') + \'">\' +  $(select.element).text() + \'</span>\'); };';
            $this->js_options[] = 'templateResult: ID_' . $this->id() . 'WithImage';
            $this->js_options[] = 'templateSelection: ID_' . $this->id() . 'WithImage';
        }

        $_name = $this->convertInputNameToKey(Str::before($this->name, '[]'));

        if ($old_data = old($this->convertInputNameToKey($_name))) {
            $this->selected = Arr::wrap($old_data);
        } else {
            $this->selected = Arr::wrap($selected);
        }
    }

    public function isSelected($key)
    {
        return (in_array($key, Arr::wrap($this->selected)));
    }
}
