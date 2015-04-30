<?php

class ProductsController extends ServiceController {

    public function createProduct()
    {
        return View::make('products.create-product');
    }

    public function listProducts()
    {
        $products = Product::orderBy('name','ASC')->get();
        return View::make('products.list-products', compact('products'));
    }

}
