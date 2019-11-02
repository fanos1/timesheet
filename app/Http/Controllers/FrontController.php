<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Timesheet;
use App\Employee;
use App\Week;
use App\Project;


class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::whereId($id)->firstOrFail();
        // get associated timeshet Rows for this employe
        $timesheetRows = $employee->timesheets()->get();
        $weeks = Week::all();
        $projects = Project::all();
        
        return view( 'frontend.show', compact('employee', 'timesheetRows', 'weeks', 'projects') );
    }


    /**
     * fetch all timesheet rows for a specific Employee and for a specific week worked
    */
    public function showByWeek($id, $weekid)
    {   
        $employee = Employee::whereId($id)->firstOrFail();
        $timesheetRows = $employee->timesheets()->get();
        
        $week = Week::whereId($weekid)->firstOrFail();
        
        
        $timeRowsThisEmployThisWeek = Timesheet::where([
            ['employee_id', '=', $employee->id],
            // ['week_id', '=', $request->get('product_id') ],
            ['week_id', '=', $weekid ],
        ])->get();
        
        return view('frontend.showbyweek', compact('employee', 'timesheetRows', 'timeRowsThisEmployThisWeek', 'week'));
    }



    /**
     * Show timesheet rows only the ones Where 
     * employee = Irfan 
     * AND week = 1 
     * AND proj = 1
     */
    public function showByWeekAndProj($id, $weekid, $projId)
    {                        
        $employee = Employee::whereId($id)->firstOrFail();
        // $timesheetRows = $employee->timesheets()->get();
         $week = Week::whereId($weekid)->firstOrFail();
        $project = Project::whereId($projId)->firstOrFail();
        
        
        $rows = Timesheet::where([
            ['employee_id', '=', $employee->id],
            // ['week_id', '=', $request->get('product_id') ],
            ['week_id', '=', $weekid ],
            ['proj_id', '=', $projId ],
        ])->get();


        return view('frontend.x', compact('employee', 'rows', 'week', 'project') );
    }
    


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
