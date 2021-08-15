<?php

namespace Spindogs\LaravelSpinForms\View\Components;

use Illuminate\View\Component;
use Str;

class FormError extends Component
{
    public $name;

    public function __construct($name)
    {
        $this->name = str_replace(['[', ']'], ['.', ''], Str::before($name, '[]'));
    }

    public function render()
    {
        return view(config('spin-forms.components.form-error.view'));
    }
}
