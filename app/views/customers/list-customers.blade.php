@extends('layouts.layout')

@section('content')

<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
    <div class="container">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4>List Customer</h4>
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
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($customers as $customer)
                                <tr>
                                    <td>{{ $customer->customer_id }}</td>
                                    <td>{{ $customer->name }}</td>
                                    <td>{{ $customer->email }}</td>
                                    <td>
                                        <a href="/edit-customer/{{ $customer->customer_id }}"><span class="label label-success">Edit</span></a>
                                        <!-- <a href="/delete-customer/{{ $customer->customer_id }}"><span class="label label-danger">Delete</span></a> -->
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