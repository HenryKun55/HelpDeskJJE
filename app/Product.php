<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Client;

class Product extends Model
{
	public $fillable = 
	[
		'name'
	];

	public function clients() {
		return $this->belongsToMany('App\Client');
	}
}
