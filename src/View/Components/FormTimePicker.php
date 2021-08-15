<?php

namespace Spindogs\LaravelSpinForms\View\Components;

class FormTimePicker extends FormElement
{
    public $field_wrap;
    public $label;
    public $name;
    public $required;
    public $show_error;
    public $type;

    public function __construct(
        string $name,
        string $id = null,
        string $label = null,
        $value = null,
        bool $required = false,
        bool $fieldWrap = true,
        bool $showError = true
    ) {
        $this->name         = $name;
        $this->id           = $id;
        $this->label        = $label;
        $this->required     = $required;
        $this->show_error   = $showError;
        $this->field_wrap   = $fieldWrap;

        if ($value) {
            if (!preg_match("/^([01]\d|2[0-3]):?([0-5]\d)$/", $value)) {
                $value = null;
            }
        }

        $this->value = old($name, $value);
    }
}
