<?php

namespace Spindogs\LaravelSpinForms\View\Components;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class FormCheckbox extends FormElement
{
    public $name;
    public $options;
    public $required;
    public $selected;
    public $show_error;
    public $title;

    public function __construct(
        string $name,
        array $options = [],
        $title = '',
        $default = null,
        bool $required = false,
        bool $showError = true
    ) {
        $this->name         = $name;
        $this->options      = $options;
        $this->required     = $required;
        $this->selected     = [];
        $this->show_error   = $showError;
        $this->title        = $title;

        $_name = Str::before($name, '[]');

        if (old($_name)) {
            $this->selected = old($_name);
        }

        if (!session()->hasOldInput()) {
            $this->selected = $default;
        }
    }

    public function isSelected($key)
    {
        return (in_array($key, Arr::wrap($this->selected)));
    }
}
