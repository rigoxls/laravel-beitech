@extends('layouts.layout')

@section('content')

<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
    <div class="container">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4>Edit Product</h4>
                </div>

                <div class="panel-body">
                    <form method="post" action="/store">
                        <p>
                            <input type="text" name="name" placeholder="Product name" class="form-control" value="{{$product[0]->name}}" required>
                        </p>
                        <p>
                            <input type="number" name="price" placeholder="Price EUR" class="form-control" value="{{$product[0]->price}}" required>
                        </p>
                        <p>
                            <input type="submit" value="Save Product" class="btn btn-primary">
                        </p>
                        <input type="hidden" value="updateProduct" name="action">
                        <input type="hidden" value="{{$product[0]->product_id}}" name="id">
                    </form>
                    @if(Session::has('message'))
                        <div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
                    @endif
                </div>

            </div>

    </div>
</div>

@stop