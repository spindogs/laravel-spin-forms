<?php

namespace Spindogs\LaravelSpinForms\View\Components;

class FormInput extends FormElement
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
        string $type = 'text',
        $value = null,
        bool $required = false,
        bool $fieldWrap = true,
        bool $showError = true
    ) {
        $this->name         = $name;
        $this->id           = $id;
        $this->label        = $label;
        $this->type         = $type;
        $this->required     = $required;
        $this->show_error   = $showError;
        $this->field_wrap   = $fieldWrap;

        $this->setValue($name, $value);
    }
}
