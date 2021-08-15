<?php

namespace Spindogs\LaravelSpinForms\View\Components;

use Carbon\Carbon;

class FormDateTimePicker extends FormElement
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
            try {
                $carbon = Carbon::createFromFormat('Y-m-d H:i', $value, 'Europe/London');
                $value = $carbon->format('Y-m-d H:i');
            } catch (\Exception $e) {
                $value = null;
            }
        }

        $this->setValue($name, $value);
    }
}
