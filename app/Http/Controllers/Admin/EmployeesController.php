<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Employee;
use App\Http\Requests\EmployeeFormRequest;
use App\Http\Requests\EmployeeEditFormRequest;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();

        return view('backend.employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeFormRequest $request)
    {
        $employee = new Employee(array(
            'f_name' => $request->get('f_name'),
            'l_name' => $request->get('l_name'),
        ));
        $employee->save();

        return redirect(action('Admin\EmployeesController@create') )->with('status', 'Employee has been created');
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
         $employee = Employee::whereId($id)->firstOrFail(); //fetch
         return view('backend.employees.edit', compact('employee'));
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
        $employee = Employee::whereId($id)->firstOrFail();

        $employee->f_name = $request->get('f_name');
        $employee->l_name = $request->get('l_name');
        $employee->save();

        return  redirect(action('Admin\EmployeesController@edit', $employee->id))
        ->with('status', 'The employee has   been updated!')
        ->with('employee', $employee);
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
