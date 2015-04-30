<?php

class ServiceController extends Controller {

    public function messages($message = null, $type = null){
        if($message){
            Session::flash('message',$message);
            Session::flash('class',$type);
        }else{
            Session::flash('message','Ops an error !!');
            Session::flash('class','danger');
        }
    }

    public function store()
    {
        if(Input::get('action')){
            return $this->{Input::get('action').'Post'}();
        }else{
            $this->messages('No action','danger');
            return Redirect::to('/');
        }
    }

    public function saveCustomerPost()
    {
        $customer = new Customer;

        $customer->name = Input::get('name');
        $customer->email = Input::get('email');

        if ($customer->save()) {
            $this->messages('Customer Saved','success');
        } else {
            $this->messages();
        }

        return Redirect::to('/');
    }

    public function updateCustomerPost()
    {
        $customer = Customer::find(Input::get('id'));

        $customer->name = Input::get('name');
        $customer->email = Input::get('email');

        if ($customer->save()) {
            $this->messages('Customer Update !','success');
        } else {
            $this->messages();
        }

        return Redirect::to('/list-customers');
    }

    public function deleteCustomerPost()
    {
        $customer = Customer::find(Input::get('id'));

        if ($customer->delete()) {
            $this->messages('Customer Deleted','success');
        } else {
            $this->messages();
        }

        return Redirect::to('users');
    }

    public function saveProductPost()
    {
        $product = new Product;

        $product->name = Input::get('name');
        $product->price = Input::get('price');

        if ($product->save()) {
            $this->messages('Product Saved!','success');
        } else {
            $this->messages();
        }

        return Redirect::to('/create-product');
    }

    public function linkCustomerProductsPost()
    {
        $products = Input::get('products');

        //remove all linked products
        DB::table('customer_products')->where('customer_id', '=', Input::get('customerId'))->delete();

        if(!$products){
            $this->messages('Customer without products linked','danger');
            return Redirect::to('/link-customer-product/'.Input::get('customerId'));
        }

        foreach ($products as $k => $product) {
            $cProducts = new CustomerProducts;
            $cProducts->customer_id = Input::get('customerId');
            $cProducts->product_id = $product;

            if ($cProducts->save()) {
                $this->messages('Customer Products Linked!','success');
            } else {
                $this->messages();
            }
        }

        return Redirect::to('/link-customer-product/'.Input::get('customerId'));
    }

    public function updateProductPost()
    {
        $product = Product::find(Input::get('id'));

        $product->name = Input::get('name');
        $product->price = Input::get('price');

        if ($product->save()) {
            $this->messages('Product Update !','success');
        } else {
            $this->messages();
        }

        return Redirect::to('/list-products');
    }

}
