<?php

namespace Spindogs\LaravelSpinForms\View\Components;

class FormTextarea extends FormElement
{
    public $label;
    public $name;
    public $required;
    public $show_error;
    public $value;

    public function __construct(
        string $name,
        string $label = '',
        $default = null,
        bool $required = false,
        bool $showError = true
    ) {
        $this->name         = $name;
        $this->label        = $label ?? $name;
        $this->required     = $required;
        $this->show_error   = $showError;

        $this->value        = old($name, $default);
    }
}
