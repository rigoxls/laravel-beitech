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
        $product = new Product;

        var_dump(Input::get());
        exit;

        $product->name = Input::get('name');
        $product->price = Input::get('price');

/*        if ($product->save()) {
            $this->messages('Product Saved!','success');
        } else {
            $this->messages();
        }*/

        return Redirect::to('/create-product');
    }

}
