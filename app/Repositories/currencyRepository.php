<?php
namespace App\Repositories;

use App\Models\currency;

class currencyRepository{

    public function  getList(){
        return currency::wherestatus('ACTIVE')->get();
    }

    public function getCurrency($id){
        return currency::whereid($id)->first();
    }

    
}