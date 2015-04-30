<?php

class Product extends \Eloquent {
    protected $table = 'product';
	protected $fillable = array("name","price");
    public $timestamps = false;
}