<?php

class Product extends \Eloquent {
    protected $table = 'product';
	protected $fillable = array("name","price");
    protected $primaryKey = 'product_id';
    public $timestamps = false;
}