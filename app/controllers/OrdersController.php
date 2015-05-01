<?php

class OrdersController extends ServiceController {

    public function createOrder()
	{
        return View::make('orders.create-order');
	}
}
