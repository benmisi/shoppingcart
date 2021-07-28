<?php

namespace App\Http\Controllers;

use App\Repositories\onlinepaymentsRepository;
use App\Repositories\orderRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   
    private $order;

    public function __construct(orderRepository $order)
    {
        $this->middleware('auth');
        $this->order = $order;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

     
        return $this->order->checkCart();
        
    }
}
