<?php

namespace Spindogs\LaravelSpinForms\View\Components;

class FormRadio extends FormElement
{
    public $field_wrap;
    public $label;
    public $name;
    public $selected;
    public $show_error;

    public function __construct(
        string $name,
        string $id = null,
        string $label = null,
        $value = null,
        bool $selected = false,
        bool $fieldWrap = true,
        bool $showError = false
    ) {
        $this->name         = $name;
        $this->id           = $id;
        $this->label        = $label ?? '&nbsp;';
        $this->value        = $value;
        $this->show_error   = $showError;
        $this->field_wrap   = $fieldWrap;

        if (old($name)) {
            $this->selected = (old($name) == $value);
        }

        if (!session()->hasOldInput()) {
            $this->selected = $selected;
        }
    }
}
