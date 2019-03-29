<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Client extends Model
{
	public $fillable =
	[
		'name',
		'fantasy_name',
		'cpf_cnpj',
		'address',
		'district',
		'email',
		'related_products',
		'responsible',
		'zip_code',
		'number',
		'complement',
		'city',
		'state',
		'phone',
		'phone_other',
		'responsible_department'
	];

	public function products() {
		return $this->belongsToMany('App\Product');
	}
}
