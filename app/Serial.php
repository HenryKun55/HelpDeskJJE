<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Serial extends Model
{

    public function emitente() {
        return $this->belongsTo('App\Emitente');
    }
}
