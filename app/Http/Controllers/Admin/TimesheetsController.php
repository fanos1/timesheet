<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Timesheet;
use App\Employee;
use App\Project;
use App\Week;



class TimesheetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $timesheets = Timesheet::all();
        return view('backend.timesheets.index', compact('timesheets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = Employee::all();
        $projects = Project::all();
        $weeks = Week::all();

        return view('backend.timesheets.create', compact('employees', 'projects', 'weeks') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd( $request->get('proj_id') );    

        foreach ($request->get('employee_id') as $key => $value) 
        {           
            $tot_hr = $request->get('time_to') - $request->get('time_from');            
            $hrs_min_lunch = $tot_hr - $request->get('lunch_brk');
            $hrs_min_all_brks = $tot_hr - ($request->get('lunch_brk') + $request->get('coffee_brk'));


            $timesheet = new Timesheet(array(
                'employee_id' => $value,

                'day' => $request->get('day'),
                'time_from' => $request->get('time_from'),
                'time_to' => $request->get('time_to'),
                'lunch_brk' => $request->get('lunch_brk'),
                'coffee_brk' => $request->get('coffee_brk'),
                'proj_id' => $request->get('proj_id'),
                'week_id' => $request->get('week_id'),

                'hrs_min_lunc' => $hrs_min_lunch,
                'hrs_min_brks' => $hrs_min_all_brks,
            ));

            $timesheet->save();

        }
        //dd($data);

        return  redirect(action('Admin\TimesheetsController@create') )
            ->with('status', 'The TIMESHEETs has   been creat!');       
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $timesheet = Timesheet::whereId($id)->firstOrFail(); //fetch

        return view('backend.timesheets.edit', compact('timesheet'));
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
        // $flight = App\Flight::find(1);
        // $flight->delete();

        Timesheet::destroy($id);

        return  redirect(action('Admin\TimesheetsController@create'))->with('status', 'The timesheet row deleted!');  
    }
}
