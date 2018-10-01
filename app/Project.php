<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public $timestamps = false;

    public function manager() {
    	return $this->hasOne('App\Manager');
    }
}
