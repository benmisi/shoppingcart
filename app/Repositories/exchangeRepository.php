<?php

namespace App\Repositories;

use App\Models\exchangerate;

class exchangeRepository{
    public function getRate($currency){
          if(!exchangerate::whereprimary_currency_id($currency)->exists()){
            $rate = exchangerate::wheresecondary_currency_id($currency)->first();
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
}