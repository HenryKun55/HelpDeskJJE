<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KnowledgeBaseFile extends Model
{
  protected $fillable = [
    'knowledge_base_id',
    'filename'
  ];

  public function knowledge_base() {
    return $this->belongsTo('App\KnowledgeBase');
  }
}
