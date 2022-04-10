<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablesTable extends Migration
{
    public function up()
    {
        Schema::create('tables', function (Blueprint $table) {
            $table->id();
            $table->string("table_name");
            $table->string("description") -> nullable();
            $table->string("status");
        });
    }

    public function down()
    {
        Schema::dropIfExists('tables');
    }
}