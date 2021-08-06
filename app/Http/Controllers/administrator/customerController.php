<?php

namespace App\Http\Controllers\administrator;

use App\Http\Controllers\Controller;
use App\Repositories\customerRepository;
use Illuminate\Http\Request;

class customerController extends Controller
{
    
    private $customer;

    public function __construct(customerRepository $customer)
    {
      $this->customer = $customer;   
      $this->middleware('auth:admin');
    }
    public function index()
    {
        $customers = $this->customer->getList();

        return view('administrator.customers.index',compact('customers'));

    }

    public function show($id){
        return $this->customer->resetPassword($id);
    }
   
}
