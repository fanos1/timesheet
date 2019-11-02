<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timesheet extends Model
{
    
    protected $guarded =['id'];

	 
    public function week() 
    {
    	// For one-to-many Relation :: use hasMany()
    	// paired with belongsTo()
    	return $this->belongsTo('App\Week'); 
    }

    // this timesheet record belong to Ilkan, It cannot belong to both John and Maria
	public function employee() 
	{
    	return $this->belongsTo('App\Employee'); 
    }
    
    
    public function project() 
    {
        // For one-to-many Relation :: use hasMany()
        // paired with belongsTo()
        return $this->belongsTo('App\Project'); 
    }
}
