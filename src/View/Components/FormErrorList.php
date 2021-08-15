<?php

namespace Spindogs\LaravelSpinForms\View\Components;

use Illuminate\View\Component;

class FormErrorList extends Component
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view(config('spin-forms.components.form-error-list.view'));
    }
}
