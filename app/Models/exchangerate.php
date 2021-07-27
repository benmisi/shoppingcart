<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class exchangerate extends Model
{
    use HasFactory;

    protected $guarded=[];

     public function primary_currency(){
         return $this->hasOne(currency::class,'id','primary_currency_id');
     }

     public function secondary_currency(){
         return $this->hasOne(currency::class,'id','secondary_currency_id');
     }
}
