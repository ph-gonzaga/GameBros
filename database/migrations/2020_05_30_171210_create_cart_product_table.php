<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartProductTable extends Migration
{

    public function up()
    {
        Schema::create('cart_product', function (Blueprint $table) {
            $table->integer('cart_id');
            $table->integer('product_id');
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('cart_product');
    }
}
