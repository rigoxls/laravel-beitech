<?php

class Order extends \Eloquent {
    protected $table = 'order';
	protected $fillable = array("customer_id","delivery_address");
    protected $primaryKey = 'order_id';
    public $timestamps = false;
}