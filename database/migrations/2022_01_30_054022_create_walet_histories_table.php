<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWaletHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('walet_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->integer('user_id');
            
            $table->integer('order_id');

            $table->boolean('is_redeem')->default(false);

            $table->integer('points');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('walet_histories');
    }
}