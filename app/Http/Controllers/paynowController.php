<?php

namespace App\Http\Controllers;

use App\Repositories\onlinepaymentsRepository;
use Illuminate\Http\Request;

class paynowController extends Controller
{
     private $payment;

     public function __construct(onlinepaymentsRepository $payment)
     {
        $this->payment = $payment; 
     }

     public function check(){
         return $this->payment->confirmCard();
     }
}
