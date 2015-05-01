@extends('layouts.layout')

@section('content')

<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
    <div class="container">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4>New Order</h4>
                </div>

                <div class="panel-body">
                    <form method="post" action="store">
                        <p class="p-header">
                            <span class="main">Customer</span>
                        </p>
                        <p>
                          <select id="customerId" name="customerId" class="selectpicker">
                              <option value="-1">- Select Customer -</option>
                              @foreach($customers as $customer)
                                  <option value="{{$customer->customer_id}}" @if(isset($customerId) && $customerId == $customer->customer_id) selected @endif>{{$customer->name}}</option>
                              @endforeach
                              </select>
                        </p>
                        <p class="p-header">
                            <span class="main">Product</span>
                            <span class="second">Unitary Price €</span>
                            <span class="second">Quantity</span>
                            <span class="second">EUR Price</span>
                            <span class="second">USD Price</span>
                        </p>
                        <p>
                            <select name="productId" class="selectpicker select-product">
                                <option value="-1">- Select Product -</option>
                                @foreach($customerProducts as $product)
                                    <option value="{{$product->product_id}}" price="{{$product->price}}">{{$product->name}}</option>
                                @endforeach
                            </select>
                            <input type="number" name="price" class="form-control input-product" required readonly="">
                            <input type="number" name="quantity" class="form-control input-product input-price" required>
                            <input type="number" name="eur-price" class="form-control input-product" required step="any" readonly="">
                            <input type="number" name="usd-price" class="form-control input-product" required step="any" readonly="">

                        </p>
                        <p>
                            <input type="submit" value="Save Product" class="btn btn-primary">
                        </p>
                        <input type="hidden" value="saveProduct" name="action">
                    </form>
                    @if(Session::has('message'))
                        <div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
                    @endif
                </div>

            </div>

    </div>
</div>

@stop