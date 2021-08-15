<?php

namespace Spindogs\LaravelSpinForms\View\Components;

use Illuminate\View\Component;

class FormWrap extends Component
{
    public $field_identifier;

    public function __construct(
        $fieldIdentifier = null
    ) {
        $this->field_identifier = $fieldIdentifier;
    }

    public function render()
    {
        return view(config('spin-forms.components.form-wrap.view'));
    }
}
