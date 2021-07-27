<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function currency(){
     return $this->hasOne(currency::class,'id','currency_id');
    }

    public function category(){
        return $this->hasOne(category::class,'id','category_id');
    }
}
