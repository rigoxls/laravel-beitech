<?php

class HomeController extends ServiceController {

    public function index()
    {
        return View::make('home');
    }

    public function createProduct()
    {
        return View::make('create-product');
    }

    public function listCustomers()
    {
        $customers = Customer::orderBy('name','ASC')->get();
        return View::make('list-customers', compact('customers'));
    }

    public function editCustomer($id)
    {
        $customer = DB::table('customer')->where('customer_id', '=', $id)->get();
        return View::make('edit-customer', compact('customer'));
    }

    public function linkCustomerProduct($customerId = null)
	{
        $products = Product::orderBy('name','ASC')->get();
        $customers = Customer::orderBy('name','ASC')->get();

        if($customerId){
            $selectedProducts = DB::table('customer_products')->where('customer_id', '=', $customerId)->get();
        }

		return View::make('link-customer-product',
            compact('customers', 'products','selectedProducts'))
        ->with('customerId', $customerId, 'selectedProducts');
	}



}
