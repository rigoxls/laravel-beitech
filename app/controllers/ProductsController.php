<?php

class ProductsController extends ServiceController {

    public function createProduct()
    {
        return View::make('products.create-product');
    }

    public function editProduct($id)
    {
        $product = DB::table('product')->where('product_id', '=', $id)->get();
        return View::make('products.edit-product', compact('product'));
    }

    public function listProducts()
    {
        $products = Product::orderBy('name','ASC')->get();
        return View::make('products.list-products', compact('products'));
    }

}
