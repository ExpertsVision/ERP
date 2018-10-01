<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $primaryKey = 'department_id';
    protected $fillable = ['department_name'];
    public $timestamps = false;

    /**
     * Get the employee that owns the department.
     */
    public function employee()
    {
        return $this->belongsTo('App\Employee', 'foreign_key', 'department_id');
    }

    /*public function employee()
    {
    	return $this->hasMany('App\Employee');
    }*/
}
