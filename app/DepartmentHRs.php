<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DepartmentHRs extends Model
{
	protected $table = 'department_hrs';
    protected $primaryKey = 'id';
    protected $fillable = ['department_id', 'hr_manager_id'];
    public $timestamps = false;
}
