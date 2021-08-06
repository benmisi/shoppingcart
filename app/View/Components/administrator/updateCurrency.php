<?php

namespace App\View\Components\administrator;

use Illuminate\View\Component;

class updateCurrency extends Component
{
  
    public $id;
    public $name;
    public function __construct($id,$name)
    {
         $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.administrator.update-currency');
    }
}
