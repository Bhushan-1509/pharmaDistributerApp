<?php

namespace App\View\Components;

use Illuminate\View\Component;

class WideCard extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $imgPath;
    public $title;
    public $text;
    public $id;
    public $btnName;
    public function __construct($imgPath,$title,$text,$btnName,$id)
    {
        $this->imgPath = $imgPath;
        $this->title = $title;
        $this->text = $text;
        $this->id = $id;
        $this->btnName = $btnName;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.wide-card');
    }
}
