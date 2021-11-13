<?php

use Illuminate\Database\Seeder;
use App\Order;

class DemoOrders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 5 ; $i++) {
            $order = new Order();
            
            $order->order_name = 'Order ' . $i;
            $order->amount = 500;
            $order->status = 1;
            $order->application_type = "Food";
            $order->razorpay_order_id = 'RXP-' . $i;
            $order->user_id = 3;

            $order->save();
        }
    }
}
