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

Route::get('/list-customers',
    ['uses' => 'HomeController@listCustomers']
);

Route::get('/edit-customer/{id}',
    ['uses' => 'HomeController@editCustomer']
);

Route::get('/link-customer-product/{id?}',
    ['uses' => 'HomeController@linkCustomerProduct']
);

Route::get('/create-product',
    ['uses' => 'HomeController@createProduct']
);

Route::post('/store/','HomeController@store');

