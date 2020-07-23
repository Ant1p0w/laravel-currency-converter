<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    public function currency(){
        return $this->belongsTo('App\Currency');
    }
}
