<?php

class ServiceController extends Controller {


    public function parseXML()
    {
        $url = 'http://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml';
        $xml = simplexml_load_file($url);
        $xmlCur = $xml->Cube->Cube->Cube;

        foreach ($xmlCur as $k => $curr) {
            $dbCurrency = DB::table('currencies')->where('name', '=', $curr->attributes()->currency)->get();

            $dbCurrency = array_shift($dbCurrency);

            //already on db
            if($dbCurrency){
                $currency = Currencies::find($dbCurrency->currency_id);
                $currency->name = $curr->attributes()->currency;
                $currency->rate = $curr->attributes()->rate;
            }
            //new currency
            else{
                $currency = new Currencies;
                $currency->name = $curr->attributes()->currency;
                $currency->rate = $curr->attributes()->rate;
            }
            $currency->save();
        }
    }

    public function restService($start_date = null, $end_date = null)
    {
        if($start_date && $end_date){

            $data_res = DB::table('order AS ord')
                ->join('order_detail AS ord_d', function($join){
                    $join->on('ord_d.order_id', '=', 'ord.order_id');
                })
                ->join('customer AS cus', function($join){
                    $join->on('cus.customer_id', '=', 'ord.customer_id');
                })
                ->join('product AS pro', function($join){
                    $join->on('ord_d.product_id', '=', 'pro.product_id');
                })
              ->select(
                    'ord.order_id',
                    'ord.customer_id',
                    'cus.name',
                    'cus.email',
                    'ord.delivery_address',
                    'ord.usd_total',
                    'ord.rate',
                    'ord.created_at',
                    'ord_d.product_id',
                    'ord_d.quantity',
                    'ord_d.price',
                    'ord_d.currency_id',
                    'ord.created_at',
                    'pro.name AS prod_name'
                )
                ->whereBetween('ord.created_at', array('2015-05-02','2015-05-03'))
                ->get();

                $array_data = array();

                foreach ($data_res as $key => $res) {
                    if(!isset($array_data[$res->order_id])){

                        $array_data[$res->order_id] = array(
                            'order_id' => $res->order_id,
                            'customer_id' => $res->customer_id,
                            'name' => $res->name,
                            'email' => $res->email,
                            'delivery_address' => $res->delivery_address,
                            'usd_total' => $res->usd_total,
                            'usd_rate' => $res->rate,
                            'created_at' => $res->created_at,
                            'bought_products' => array(
                                '0' => array(
                                    'product_id' => $res->product_id,
                                    'product' => $res->prod_name,
                                    'quantity' => $res->quantity,
                                    'currency_id' => $res->currency_id,
                                    'price' => $res->price
                                )
                            )
                        );
                    }else{
                        array_push(
                            $array_data[$res->order_id]['bought_products'],
                            array(
                                    'product_id' => $res->product_id,
                                    'product' => $res->prod_name,
                                    'quantity' => $res->quantity,
                                    'currency_id' => $res->currency_id,
                                    'price' => $res->price
                                )
                        );
                    }
                }//end foreach

            $this->restResponse(200, "orders found", $array_data);
        }else{
            $this->restResponse(400, "error on request", NULL);
        }
    }

    public function restResponse($status, $status_message, $data)
    {
        header('Content-Type: application/json');
        //header("HTTP/1.1 $status $status_message");
        $response["status"] = $status;
        $response["status_message"] = $status_message;
        $response["response"] = $data;

        $json_response = json_encode($response);
        echo $json_response;
    }

    public function messages($message = null, $type = null)
    {
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

    public function saveOrderPost()
    {
        $orderList = Input::get('orderList');

        $order = new Order;
        $order->customer_id = Input::get('customerId');
        $order->usd_total = Input::get('totalUsd');
        $order->rate = Input::get('rate');
        $order->delivery_address = Input::get('deliveryAddress');

        if($order->save()){
            if(sizeof($orderList)){
                foreach ($orderList as $ol) {
                    $orderDetails = new OrderDetail;
                    $orderDetails->currency_id = $ol['currencyId'];
                    $orderDetails->product_id = $ol['productId'];
                    $orderDetails->order_id = $order->order_id;
                    $orderDetails->quantity = $ol['quantity'];
                    $orderDetails->price = $ol['price'];
                    $orderDetails->save();
                }
            }

            $this->messages('Order saved !','success');
        }

    }

}
