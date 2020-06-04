<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
    ];

    // Pedido composto para 1 usuario
    public function user(){
        return $this->belongsTo(User::class);
    }

    // Produtos composto do pedido
    public function products(){
        return $this->hasMany(Product::class);
    }
}
