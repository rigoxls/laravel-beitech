<?php

class CustomersController extends ServiceController {

    public function createCustomer()
    {
        return View::make('customers.create-customer');
    }

    public function listCustomers()
    {
        $customers = Customer::orderBy('name','ASC')->get();
        return View::make('customers.list-customers', compact('customers'));
    }

    public function editCustomer($id)
    {
        $customer = DB::table('customer')->where('customer_id', '=', $id)->get();
        return View::make('customers.edit-customer', compact('customer'));
    }

    public function linkCustomerProduct($customerId = null)
	{
        $products = Product::orderBy('name','ASC')->get();
        $customers = Customer::orderBy('name','ASC')->get();

        $selectedProducts = array();

        if($customerId){
            $selectedProducts = DB::table('customer_products')->where('customer_id', '=', $customerId)->get();
        }

		return View::make('customers.link-customer-product',
            compact('customers', 'products','selectedProducts'))
        ->with('customerId', $customerId);
	}
}
