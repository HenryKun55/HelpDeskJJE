<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KnowledgeBase extends Model
{
  protected $fillable = [
    'subject',
    'related_product',
    'description'
  ];

  public function files() {
    return $this->hasMany('App\KnowledgeBaseFile');
  }
}
