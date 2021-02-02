<?php

namespace Spindogs\LaravelSpinForms\View\Components;

class FormLabel extends FormElement
{
    public $label;
    public $required;

    public function __construct(
        string $label,
        bool $required = false
    ) {
        $this->label = $label;
        $this->required = $required;
    }
}
