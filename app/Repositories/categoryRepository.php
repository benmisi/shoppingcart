<?php

namespace App\Repositories;

use App\Models\category;

class categoryRepository{

    public function getList(){

        return category::with('products')->get();
    }
}