<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string("item_name");
            $table->string("description") -> nullable();
            $table->unsignedBigInteger("category_id") -> nullable();
            $table->double("unit_price");
            $table->string("status");
            $table->string("item_image");
            
            $table->foreign("category_id")->references("id")
                -> on("categories") -> cascadeOnDelete("cascade");
        });
    }

    public function down()
    {
        Schema::dropIfExists('items');
    }
}