<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    public function project()
    {
        return $this->belongsTo('App\Project', 'foreign_key', 'project_manager_id');
    }
    public function company()
    {
        return $this->belongsTo('App\Company', 'foreign_key', 'company_id');
    }
}
