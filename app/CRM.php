<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CRM extends Model
{
  protected $fillable =
  [
    'client',
    'phone',
    'cellphone',
    'email',
    'indicator',
    'seller_id',
    'status'
  ];

  public function crmActions() {
    return $this->hasMany('App\CRMAction');
  }

  public function seller() {
    return $this->belongsTo('App\User');
  }
}
