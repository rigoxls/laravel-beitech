@extends('layouts.layout')

@section('content')

<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
    <div class="container">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4>Link Users with Products</h4>
                </div>

                <div class="panel-body">
                    <form method="post" action="/store">
                        <p>
                          <select name="customerId" class="selectpicker" onchange="window.location=window.location.origin + '/link-customer-product/' + this.options[this.selectedIndex].value">
                          @foreach($customers as $customer)
                            <option value="{{$customer->customer_id}}" @if(isset($customerId) && $customerId == $customer->customer_id) selected @endif>{{$customer->name}}</option>
                          @endforeach
                          </select>
                        </p>
                        <p>
                          @foreach($products as $product)
                            <?php $checked = false; ?>
                            @foreach($selectedProducts as $sp)
                                @if($sp->product_id == $product->product_id)
                                   <?php $checked = true; ?>
                                @endif
                            @endforeach
                            <input type="checkbox" name="products[]" value="{{$product->product_id}}" @if($checked) checked @endif/>  {{$product->name}}&nbsp;
                          @endforeach
                        </p>
                        <p>
                            <input type="submit" value="Link Customer" class="btn btn-primary">
                        </p>
                        <input type="hidden" value="linkCustomerProducts" name="action">
                    </form>

                    @if(Session::has('message'))
                        <div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
                    @endif
                </div>

            </div>

    </div>
</div>

@stop