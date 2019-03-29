<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable =
    [
      'description',
      'priority',
      'status',
      'comment',
      'user_id'
    ];
  
    public function taskActions() {
      return $this->hasMany('App\TaskAction');
    }
}
