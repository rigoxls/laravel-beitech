@extends('layout')

@section('content')

<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
    <div class="container">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4>List products</h4>
                </div>

                <div class="panel-body">
                    @if(Session::has('message'))
                        <div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
                    @endif
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{ $product->product_id }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>
                                        <a href="/edit-product/{{ $product->product_id }}"><span class="label label-success">Edit</span></a>
                                        <!-- <a href="/delete-product/{{ $product->product_id }}"><span class="label label-danger">Delete</span></a> -->
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>

    </div>
</div>

@stop