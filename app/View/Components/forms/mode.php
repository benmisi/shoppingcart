<?php

namespace App\View\Components\forms;

use Illuminate\View\Component;

class mode extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $name;
    public $label;
    public $size;
   public function __construct($name,$label,$size)
   {
    $this->name = $name;
    $this->label = $label;
    $this->size = $size;
   }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.mode');
    }
}
