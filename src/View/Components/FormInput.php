<?php

namespace Spindogs\LaravelSpinForms\View\Components;

class FormInput extends FormElement
{
    public $label;
    public $name;
    public $required;
    public $show_error;
    public $type;
    public $value;

    public function __construct(
        string $name,
        string $label = '',
        string $type = 'text',
        $default = null,
        bool $required = false,
        bool $showError = true
    ) {
        $this->name         = $name;
        $this->label        = $label ?? $name;
        $this->type         = $type;
        $this->required     = $required;
        $this->show_error   = $showError;
        
        $this->value        = old($name, $default);
    }
}
