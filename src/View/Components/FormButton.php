<?php

namespace Spindogs\LaravelSpinForms\View\Components;

use Illuminate\View\Component;

class FormButton extends Component
{
    public $type;

    public function __construct($type = 'submit')
    {
        $type = strtolower($type);
        if (!in_array($type, ['button', 'reset', 'submit'])) {
            $type = 'submit';
        }

        $this->type = $type;
    }

    public function render()
    {
        return view(config('spin-forms.components.form-button.view'));
    }
}
