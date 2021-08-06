<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class delivery extends Model
{
    use HasFactory;

     protected $guarded =[];

     public function order(){
         return $this->hasOne(orders::class,'id','order_id');
     }

     public function deliverer(){
         return $this->hasOne(administrator::class,'id','delivered_by');
     }
}
