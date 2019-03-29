<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CRMAction extends Model
{
  protected $fillable =
  [
    'date',
    'hour',
    'responsible_id',
    'product',
    'status',
    'contact_date',
    'contact_hour',
    'description',
    'c_r_m_id'
  ];

  public function c_r_m() {
    return $this->belongsTo('App\CRM');
  }

  public function responsible() {
    return $this->belongsTo('App\User');
  }
}
