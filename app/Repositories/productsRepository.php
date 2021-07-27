<?php
namespace App\Repositories;

use App\Models\products;

class productsRepository{

    public function getList(){
        return products::with('currency','category')->get();
    }

    public function getProduct($id){

        return products::with('currency','category')->whereid($id)->first();
    }

    public function getProductsByCategory($id){
        return products::with('currency','category')->wherecategory_id($id)->get();   
    }


}