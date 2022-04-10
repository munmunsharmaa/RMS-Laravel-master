<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("order_id")->nullable();
            $table->unsignedBigInteger("item_id")->nullable();
            $table->integer("qty_order");

            $table->foreign("order_id")->references("id")
                -> on("orders") -> cascadeOnDelete("cascade");
            $table->foreign("item_id")->references("id")
                -> on("items") -> cascadeOnDelete("cascade");
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_details');
    }
}
