<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->string('order_name');
            $table->string('status');
            
            $table->integer('amount');
            $table->string('promocode')->nullable();
            
            $table->string('application_type');
            $table->string('razorpay_order_id');
            
            $table->tinyInteger('is_favourite')->nullable();

            $table->text('product');
            $table->text('shop_address');
            $table->text('customer_address');

            $table->datetime('confirm_at')->nullable();
            $table->datetime('pickup_at')->nullable();
            $table->datetime('delivered_at')->nullable();
            
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('partner_user_id')->default(0);
            
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
        Schema::dropIfExists('orders');
    }
}
