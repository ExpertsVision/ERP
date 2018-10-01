<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShiftType extends Model
{
    public $timestamps = false;

   /**
     * Get the employee that owns the shifttype.
     */
    public function employee()
    {
        return $this->belongsTo('App\Employee', 'foreign_key', 'shift_timing_id');
    }
}
