<?php

namespace Spindogs\LaravelSpinForms\View\Components;

use Illuminate\View\Component;

class Form extends Component
{
    public $method;
    public $files;
    public $method_spoof;

    public function __construct(
        string $method = 'POST',
        bool $files = false
    ) {
        $this->files = $files;
        $this->method = strtoupper($method);
        $this->method_spoof = in_array($this->method, ['PUT', 'PATCH', 'DELETE']);
    }

    public function render()
    {
        return view(config('spin-forms.components.form.view'));
    }

    public function hasError()
    {
        // With Form, we just want to know if there are any errors.
        if (session()->has('errors')) {
            $error_bag = session('errors')->getBag('default');

            if ($error_bag && !$error_bag->isEmpty()) {
                return true;
            }
        }

        return false;
    }
}
