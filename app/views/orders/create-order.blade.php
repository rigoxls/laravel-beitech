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
                        <div class="p-header">
                            <span class="main">Customer</span>
                        </div>
                        <div>
                          <select id="customerId" name="customerId" class="selectpicker">
                              <option value="-1">- Select Customer -</option>
                              @foreach($customers as $customer)
                                  <option value="{{$customer->customer_id}}" @if(isset($customerId) && $customerId == $customer->customer_id) selected @endif>{{$customer->name}}</option>
                              @endforeach
                              </select>
                        </div>
                        <div class="p-header">
                            <span class="main">Product</span>
                            <span class="second">Unitary Price €</span>
                            <span class="second">Quantity</span>
                            <span class="second">EUR Price</span>
                            <span class="second">USD Price</span>
                        </div>
                        <div class="container-rows">
                            <div class="product-row">
                                    <select class="selectpicker select-product" usd="{{$usdCurrency['rate']}}">
                                        <option value="-1">- Select Product -</option>
                                        @foreach($customerProducts as $product)
                                            <option value="{{$product->product_id}}" price="{{$product->price}}">{{$product->name}}</option>
                                        @endforeach
                                    </select>
                                    <input type="number" class="form-control input-product price" required readonly="">
                                    <input type="number" class="form-control input-product input-price quantity" required>
                                    <input type="number" class="form-control input-product eur-price" required step="any" readonly="">
                                    <input type="number" class="form-control input-product usd-price" required step="any" readonly="">

                            </div>
                        </div>

                        <div class="total-prices">
                            <input type="number" class="form-control input-product total-eur" required step="any" readonly="">
                            <input type="number" class="form-control input-product total-usd" required step="any" readonly="">
                        </div>

                        <p class="pull-right action-buttons">
                            <input type="button" id="addRow" value="Add Product" class="btn btn-success">
                            <input type="button" value="Save Product" class="btn btn-primary">
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