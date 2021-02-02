<?php

namespace Spindogs\LaravelSpinForms\View\Components;

use Carbon\Carbon;

class FormDateTimePicker extends FormElement
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
        $default = null,
        bool $required = false,
        bool $showError = true
    ) {
        $this->name         = $name;
        $this->label        = $label;
        $this->required     = $required;
        $this->show_error   = $showError;

        if ($default) {
            try {
                $carbon = Carbon::createFromFormat('Y-m-d H:i', $default, 'Europe/London');
                $default = $carbon->format('Y-m-d H:i');
            } catch (\Exception $e) {
                $default = null;
            }
        }

        $this->value = old($name, $default);
    }
}
