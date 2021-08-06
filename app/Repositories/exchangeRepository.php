<?php

namespace App\Repositories;

use App\Models\exchangerate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class exchangeRepository{
    public function getRate($currency){
          if(!exchangerate::whereprimary_currency_id($currency)->exists()){
            $rate = exchangerate::wheresecondary_currency_id($currency)->orderBy('id','desc')->first();
            if(!is_null($rate)){
                return $rate->amount;
            }
            else{
                return 0;
            }
          }else{
              return 1;
          }

    }

    public function getList(){
        return exchangerate::with('primary_currency','secondary_currency')->get();
    }

    public function create(Request $request){
        $request->validate(['primary'=>'required','secondary'=>'required','amount'=>'required']);
        exchangerate::create(['primary_currency_id'=>$request->primary,'secondary_currency_id'=>$request->secondary,'amount'=>$request->amount,'user_id'=>Auth::guard('admin')->user()->id]);
        return redirect()->back()->with('statusSuccess','Rate Successfully Created');
    }

    
}