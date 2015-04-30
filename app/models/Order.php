<?php

class Customer extends \Eloquent {
    protected $table = 'customer';
	protected $fillable = array("name","email");
    public $timestamps = false;
}