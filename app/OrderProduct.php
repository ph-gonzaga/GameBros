<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $fillable = ['order_id','product_id','price'];

    // Na order table, cada item pertence a um pedido
    public function orderItem(){
        return $this->belongsTo(Order::class);
    }
}
