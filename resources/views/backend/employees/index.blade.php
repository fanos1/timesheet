@extends('master')

@section('title', 'all employees')

@section('content')
   
   <div  class="container">
      <div class="col-12">
   
         <h2>All  employees</h2>
         
         @if   (session('status'))
            <div class="alert alert-success">
               {{ session('status') }}
            </div>
         @endif


         @if ($employees->isEmpty())
            <p>   There is no employee.</p>
         @else
            <table   class="table">
               <thead>
               <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>last name</th>
               </tr>
               </thead>
               <tbody>
                  @foreach($employees as $employee)
                     <tr>                        
                        <td>                                  
                           <a href="{!! action('Admin\EmployeesController@edit',  $employee->id) !!}"> 
                              {!! $employee->id !!} </a>
                        </td>
                        <td>{!!  $employee->f_name !!}</td>
                        <td>{!!  $employee->l_name !!}</td>
                     </tr>
                  @endforeach
               </tbody>
            </table>
         @endif
      </div>
   </div>      

@endsection