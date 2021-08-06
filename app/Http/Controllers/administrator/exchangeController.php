<?php

namespace App\Http\Controllers\administrator;

use App\Http\Controllers\Controller;
use App\Repositories\administrator\currencyRepository;
use App\Repositories\exchangeRepository;
use Illuminate\Http\Request;

class exchangeController extends Controller
{
   
    public $rate;
    public $currency;
    public function __construct(exchangeRepository $rate,currencyRepository $currency)
    {
      $this->rate = $rate; 
      $this->currency = $currency;  
      $this->middleware('auth:admin');
    }
    public function index()
    {
      $currency=  $this->currency->getList();
      $rates = $this->rate->getList();
      return  view('administrator.exchange.index',compact('currency','rates'));
    }

    
    public function store(Request $request)
    {
     return $this->rate->create($request);
    }

    public function destroy($id)
    {
        //
    }
}
