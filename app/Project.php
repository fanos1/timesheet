<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = ['id'];

    
    public function timesheets() {
    	// For one-to-many Relation :: use hasMany()
    	// paired with belongsTo()
    	return $this->hasMany('App\Timesheet')->withTimestamps();
    } 

}
