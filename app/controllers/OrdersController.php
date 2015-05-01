<?php

class OrdersController extends ServiceController {

    public function createOrder($customerId = null)
	{
        $products = DB::table('product')->orderBy('name','ASC')->get();
        $customers = Customer::orderBy('name','ASC')->get();

        $selectedProducts = array();
        $customerProducts = array();

        if($customerId){
            $selectedProducts = DB::table('customer_products')->where('customer_id', '=', $customerId)->get();
        }

        foreach ($selectedProducts as $sProduct) {
            foreach ($products as $prod) {
                if($sProduct->product_id == $prod->product_id){
                    $customerProducts[] = $prod;
                }
            }
        }

        return View::make('orders.create-order',
            compact('customers', 'customerProducts'))
        ->with('customerId', $customerId);
	}
}
