<?php

namespace Spindogs\LaravelSpinForms\View\Components;

use Illuminate\Support\Str;
use Illuminate\View\Component;

abstract class FormElement extends Component
{
    public $id = null;

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $form_element_alias = Str::kebab(class_basename($this));

        return view(config('spin-forms.components.' . $form_element_alias . '.view'));
    }

    public function id()
    {
        if (!$this->id) {
            $this->id = uniqid();
        }

        return $this->id;
    }

    public function hasError()
    {
        // With Form Element, we need to see if the individual element has an error
        if (session()->has('errors')) {
            $error_bag = session('errors')->getBag('default');

             // Error for multiple are reliant on there being a valid key.
             // Of Form Element name ends in [], we check to see if there is an error associated with the name.
             // This will cause all elements with the same name being highlighted, and mean that error messages won't
             // be applied correctly. Need to ensure that we have keys in place
            $error_name = str_replace(['[', ']'], ['.', ''], Str::before($this->name, '[]'));

            // Check to see if name or name child has error
            if ($error_bag && ($error_bag->has($error_name) || $error_bag->has($error_name . '.*'))) {
                return true;
            }
        }

        return false;
    }

    public function showError()
    {
        return $this->show_error && $this->hasError();
    }
}
