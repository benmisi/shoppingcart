<?php

namespace App\View\Components\user;

use Illuminate\View\Component;

class orders extends Component
{
  
    public $orders;
    public $type;
    public function __construct($orders,$type)
    {
         $this->orders = $orders;
         $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.user.orders');
    }
}
