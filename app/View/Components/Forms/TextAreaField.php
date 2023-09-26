<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class TextAreaField extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $className = null;
    public $label = null;
    public $name = null;
    public function __construct($className,$label,$name)
    {
        //
        $this->className = $className;
        $this->label = $label;
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.text-area-field');
    }
}
