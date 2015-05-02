<?php

class Order extends \Eloquent {
    protected $table = 'order';
	protected $fillable = array("customer_id","usd_total","rate","delivery_address");
    protected $primaryKey = 'order_id';
}