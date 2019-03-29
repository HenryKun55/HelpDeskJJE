<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\ResetPassword;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'branch_line_id', 'department_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function branchLine() {
      return $this->belongsTo('App\BranchLine');
    }

    public function department() {
      return $this->belongsTo('App\Department');
    }

    public function sendPasswordResetNotification($token) {

      $this->notify(new ResetPassword($token));
    }
}
