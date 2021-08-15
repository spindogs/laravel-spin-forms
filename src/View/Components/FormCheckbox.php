<?php

namespace Spindogs\LaravelSpinForms\View\Components;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class FormCheckbox extends FormElement
{
    public $field_wrap;
    public $label;
    public $name;
    public $required;
    public $show_error;
    public $selected;

    public function __construct(
        string $name,
        string $id = null,
        string $label = null,
        $value = 1,
        bool $selected = false,
        bool $required = false,
        bool $fieldWrap = true,
        bool $showError = false
    ) {
        $this->name         = $name;
        $this->id           = $id;
        $this->label        = $label ?? '&nbsp;';
        $this->value        = $value;
        $this->required     = $required;
        $this->show_error   = $showError;
        $this->field_wrap   = $fieldWrap;

        $_name = $this->convertInputNameToKey(Str::before($this->name, '[]'));

        if ($old_data = old($this->convertInputNameToKey($_name))) {
            $this->selected = in_array($value, Arr::wrap($old_data));
        }

        if (!session()->hasOldInput()) {
            $this->selected = $selected;
        }
    }
}
