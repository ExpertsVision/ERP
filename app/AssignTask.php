<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignTask extends Model
{
     public function user() {
    	return $this->hasMany('App\AssignTask');
    }
}
