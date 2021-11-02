<?php

namespace Spindogs\LaravelSpinForms\View\Components;

use Illuminate\Support\Str;

class FormRadio extends FormElement
{
    public $field_wrap;
    public $label;
    public $name;
    public $selected;
    public $readonly;
    public $show_error;

    public function __construct(
        string $name,
        string $id = null,
        string $label = null,
        $value = null,
        bool $selected = false,
        bool $readonly = false,
        bool $fieldWrap = true,
        bool $showError = false
    ) {
        $this->name         = $name;
        $this->id           = $id;
        $this->label        = $label ?? '&nbsp;';
        $this->value        = $value;
        $this->readonly     = $readonly;
        $this->show_error   = $showError;
        $this->field_wrap   = $fieldWrap;

        $_name = $this->convertInputNameToKey(Str::before($this->name, '[]'));

        if (old($this->convertInputNameToKey($_name))) {
            $this->selected = (old($_name) == $value);
        }

        if (!session()->hasOldInput()) {
            $this->selected = $selected;
        }
    }
}
