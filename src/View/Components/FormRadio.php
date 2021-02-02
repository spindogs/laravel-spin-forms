<?php

namespace Spindogs\LaravelSpinForms\View\Components;

class FormRadio extends FormElement
{
    public $name;
    public $options;
    public $required;
    public $selected;
    public $show_error;
    public $title;
    
    public function __construct(
        string $name,
        array $options = [],
        $title = '',
        $default = null,
        bool $required = false,
        bool $showError = true
    ) {
        $this->name         = $name;
        $this->options      = $options;
        $this->required     = $required;
        $this->show_error   = $showError;
        $this->selected     = old($name, $default);
        $this->title        = $title;
    }

    public function isSelected($key)
    {
        return $key == $this->selected;
    }
}
