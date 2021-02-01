<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->string('user_id')->primary();
            $table->decimal('balance',8,2);
            $table->decimal('margin',8,2);
            $table->decimal('margin_used',8,2);
            $table->string('leverage',6);
            $table->timestamps();
        });

        DB::statement('ALTER Table accounts add id INTEGER NOT NULL UNIQUE AUTO_INCREMENT FIRST;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
}
