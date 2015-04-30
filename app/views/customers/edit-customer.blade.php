@extends('layouts.layout')

@section('content')

<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
    <div class="container">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4>New customer</h4>
                </div>

                <div class="panel-body">
                    <form method="post" action="/store">
                        <p>
                            <input type="text" name="name" placeholder="Customer name" class="form-control" value="{{$customer[0]->name}}" required>
                        </p>
                        <p>
                            <input type="email" name="email" placeholder="Customer email" class="form-control" value="{{$customer[0]->email}}" required>
                        </p>
                        <p>
                            <input type="submit" value="Save Customer" class="btn btn-primary">
                        </p>
                        <input type="hidden" value="updateCustomer" name="action">
                        <input type="hidden" value="{{$customer[0]->customer_id}}" name="id">
                    </form>
                    @if(Session::has('message'))
                        <div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
                    @endif
                </div>

            </div>

    </div>
</div>

@stop