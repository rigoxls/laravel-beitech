<?php

class Currencies extends \Eloquent {
    protected $table = 'currencies';
	protected $fillable = array("name","rate");
    protected $primaryKey = 'currency_id';
    public $timestamps = false;
}