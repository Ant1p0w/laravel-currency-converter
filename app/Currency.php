<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    public function rate(){
        return $this->hasOne('App\Rate')->latest();
    }
}
