<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderitems extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function product(){
        return $this->hasOne(products::class,'id','product_id');
    }
}
