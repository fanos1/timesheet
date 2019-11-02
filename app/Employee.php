<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Employee extends Model
{
     protected $guarded =['id'];

     // this employee is associated with Many timesheet records
	public function timesheets() {
    	// For one-to-many Relation :: use hasMany()
    	// paired with belongsTo()
    	return $this->hasMany('App\Timesheet'); 
    }
     
}
