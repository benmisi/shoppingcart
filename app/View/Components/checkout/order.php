<?php

namespace App\View\Components\checkout;

use Illuminate\View\Component;

class order extends Component
{
    public $cart;
    public function __construct($cart)
    {
        $this->cart = $cart;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.checkout.order');
    }
}
