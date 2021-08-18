<?php

namespace App\View\Components;

use Illuminate\View\Component;

class mycart extends Component
{
   
    public $cart;
    public $currency;
    public function __construct($cart,$currency)
    {
        $this->cart = $cart;
        $this->currency = $currency;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.mycart');
    }
}
