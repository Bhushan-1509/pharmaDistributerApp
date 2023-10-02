<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class WideCard extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $imgPath;
    public $text;
    public $title;
    public $firstBtn;
    public $secondBtn;
    public $id;
    public function __construct($imgPath,$text,$title,$firstBtn,$secondBtn)
    {
        $this->imgPath = $imgPath;
        $this->text = $text;
        $this->title = $title;
        $this->firstBtn = $firstBtn;
        $this->secondBtn = $secondBtn;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.wide-card');
    }
}
