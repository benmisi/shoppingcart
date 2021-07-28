<?php

namespace App\View\Components\user;

use Illuminate\View\Component;

class orders extends Component
{
  
    public $orders;
    public function __construct($orders)
    {
         $this->orders = $orders;
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
