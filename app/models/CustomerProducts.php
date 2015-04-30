<?php

class CustomerProducts extends \Eloquent {
    protected $table = 'customer_products';
	protected $fillable = array("product_id", "customer_id");
    public $timestamps = false;
}