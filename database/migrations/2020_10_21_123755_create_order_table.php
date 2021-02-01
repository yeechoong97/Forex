<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->string('ticketID')->primary();
            $table->string('user_id');
            $table->string('type',5);
            $table->string('pair');
            $table->double('margin');
            $table->integer('total_units');
            $table->integer('available_units');
            $table->double('entry_price');
            $table->integer('status')->default(0);
            $table->timestamps();

            $table->foreign('user_id')->references('user_id')->on('accounts');

        });

        
        DB::statement('ALTER Table orders add id INTEGER NOT NULL UNIQUE AUTO_INCREMENT FIRST;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
