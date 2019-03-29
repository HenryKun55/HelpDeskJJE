<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskAction extends Model
{
    protected $fillable =
    [
      'date',
      'hour',
      'status',
      'comment',
      'task_id'
    ];
  
    public function task() {
      return $this->belongsTo('App\Task');
    }
}
