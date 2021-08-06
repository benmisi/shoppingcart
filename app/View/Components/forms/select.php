<?php

namespace App\View\Components\forms;

use Illuminate\View\Component;

class select extends Component
{
   

     public $options;
     public $name;
     public $label;
     public $size;
     public function __construct($options,$name,$label,$size)
     {
         $this->options = $options;
         $this->name = $name;
            $this->label = $label;
            $this->size = $size;
         
     }
    public function render()
    {
        return view('components.forms.select');
    }
}
