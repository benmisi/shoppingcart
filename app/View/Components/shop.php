<?php

namespace App\View\Components;

use Illuminate\View\Component;

class shop extends Component
{
    public $products;
    public $cart;
    public function __construct($products,$cart)
    {
        $this->products = $products;
        $this->cart = $cart;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.shop');
    }
}
