<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SolicitationsFile extends Model
{
  protected $fillable = [
    'action_id',
    'filename'
  ];

  public function action() {
    return $this->belongsTo('App\Action');
  }
}
