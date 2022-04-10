<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("employee_id")->nullable();
            $table->timestamp("order_date");
            $table->string("status");
            $table->integer("print_qty");
            $table->unsignedBigInteger("table_id")->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
