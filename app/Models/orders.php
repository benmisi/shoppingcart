<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function items(){
        return $this->hasMany(orderitems::class,'order_id','id');
    }

    public function receipts(){
        return $this->hasMany(receipts::class,'invoicenumber','invoicenumber');
    }

    public function delivery(){
        return $this->hasOne(delivery::class,'order_id','id');
    }

}
