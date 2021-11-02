<?php

namespace Spindogs\LaravelSpinForms\View\Components;

class FormTextarea extends FormElement
{
    public $field_wrap;
    public $label;
    public $name;
    public $required;
    public $readonly;
    public $show_error;

    public function __construct(
        string $name,
        string $id = null,
        string $label = null,
        $value = null,
        bool $required = false,
        bool $readonly = false,
        bool $fieldWrap = true,
        bool $showError = true
    ) {
        $this->name         = $name;
        $this->id           = $id;
        $this->label        = $label;
        $this->required     = $required;
        $this->readonly     = $readonly;
        $this->show_error   = $showError;
        $this->field_wrap   = $fieldWrap;

        $this->setValue($name, $value);
    }
}
