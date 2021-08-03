<?php

namespace Spindogs\LaravelSpinForms\View\Components;

class FormTimePicker extends FormElement
{
    public $label;
    public $name;
    public $required;
    public $show_error;
    public $type;
    public $value;

    public function __construct(
        string $name,
        string $id = null,
        string $label = '',
        $default = null,
        bool $required = false,
        bool $showError = true
    ) {
        $this->name         = $name;
        $this->id           = $id;
        $this->label        = $label;
        $this->required     = $required;
        $this->show_error   = $showError;

        if ($default) {
            if (!preg_match("/^([01]\d|2[0-3]):?([0-5]\d)$/", $default)) {
                $default = null;
            }
        }

        $this->value = old($name, $default);
    }
}
