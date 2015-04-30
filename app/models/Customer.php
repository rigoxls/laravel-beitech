<?php

class Customer extends \Eloquent {
    protected $table = 'customer';
	protected $fillable = array("name","email");
    protected $primaryKey = 'customer_id';
    public $timestamps = false;
}