<?php

namespace App\View\Components;

use Illuminate\View\Component;

class product extends Component
{
    public $product;
    public $cart;
    public function __construct($product,$cart)
    {
        $this->product = $product;
        $this->cart = $cart;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.product');
    }
}
