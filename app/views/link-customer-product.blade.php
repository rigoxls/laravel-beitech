@extends('layout')

@section('content')

<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
    <div class="container">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4>Link Users with Products</h4>
                </div>

                <div class="panel-body">
                    <form method="post" action="store">
                        <p>
                          <select class="selectpicker">
                          @foreach($customers as $customer)
                            <option value="{{$customer->customer_id}}">{{$customer->name}}</option>
                          @endforeach
                          </select>
                        </p>
                        <p>
                          @foreach($products as $product)
                            <input type="checkbox" name="product[]" value="{{$product->product_id}}" />  {{$product->name}}&nbsp;
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