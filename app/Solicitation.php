<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitation extends Model
{

  protected $fillable = [
    'protocol_number',
    'status',
    'subject',
    'solicitation_type',
    'occurrence_type',
    'priority',
    'category',
    'responsible_department_id',
    'responsible_id',
    'solicitation_description',
    'client_id'
  ];

  public function client() {
    return $this->belongsTo('App\Client');
  }

  public function responsible() {
    return $this->belongsTo('App\User');
  }

  public function responsible_department() {
    return $this->belongsTo('App\Department');
  }

  public function actions() {
    return $this->hasMany('App\Action');
  }
}
