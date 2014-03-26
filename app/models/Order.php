<?php

class Order extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];
	
	protected $table = 'orders';

	// Don't forget to fill this array
	protected $fillable = [];

}