<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
  protected $fillable = [
    'service_mode',
    'status',
    'responsible_id',
    'description',
    'solicitation_id'
  ];

  public function solicitation() {
    return $this->belongsTo('App\Solicitation');
  }

  public function solicitationsFiles() {
    return $this->hasMany('App\SolicitationsFile');
  }

  public function responsible() {
    return $this->belongsTo('App\User');
  }
}
