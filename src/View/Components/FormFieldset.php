<?php

namespace Spindogs\LaravelSpinForms\View\Components;

class FormFieldset extends FormElement
{
    public $name;
    public $required;
    public $show_error;
    public $title;
    public $type;

    public function __construct(
        string $name,
        string $type,
        string $title,
        bool $required = false,
        bool $showError = false
    ) {
        $this->name         = $name;
        $this->title        = $title;
        $this->required     = $required;
        $this->show_error   = $showError;

        if (!in_array(strtolower($type), ['checkbox', 'radio'])) {
            dd('Error, must be of type checkbox or radio');
        }

        switch (strtolower($type)) {
            case 'checkbox':
                $this->type = '__checkbox';
                break;

            case 'radio':
                $this->type = '__radiobuttons';
                break;

            default:
                # code...
                break;
        }
    }

    public function render()
    {
        return view(config('spin-forms.components.form-fieldset.view'));
    }
}
