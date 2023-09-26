<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class InputFieldInRow extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $className,string $name, string $type)
    {

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.input-field-in-row');
    }
}
