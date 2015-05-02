<?php

class OrderDetail extends \Eloquent {
    protected $table = 'order_detail';
	protected $fillable = array("currency_id","product_id","order_id","quantity","price");
    protected $primaryKey = 'order_detail_id';
    public $timestamps = false;
}