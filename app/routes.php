<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/',
    ['uses' => 'HomeController@index']
);

//Customers routes

Route::get('/create-customer',
    ['uses' => 'CustomersController@createCustomer']
);

Route::get('/list-customers',
    ['uses' => 'CustomersController@listCustomers']
);

Route::get('/edit-customer/{id}',
    ['uses' => 'CustomersController@editCustomer']
);

Route::get('/link-customer-product/{id?}',
    ['uses' => 'CustomersController@linkCustomerProduct']
);

//products routes
Route::get('/create-product',
    ['uses' => 'ProductsController@createProduct']
);

Route::get('/edit-product/{id}',
    ['uses' => 'ProductsController@editProduct']
);

Route::get('/list-products',
    ['uses' => 'ProductsController@listProducts']
);

//Orders
Route::get('/create-order',
    ['uses' => 'OrdersController@createOrder']
);

//Orders
Route::get('/get-currencies',
    ['uses' => 'ServiceController@parseXML']
);

Route::post('/store/','ServiceController@store');

