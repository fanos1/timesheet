@extends('master')

@section('title', 'all timesheets')

@section('content')
   
   <div  class="container">
      <div class="col-12">
   
         <h2>All  timesheets</h2>
         
         @if   (session('status'))
            <div class="alert alert-success">
               {{ session('status') }}
            </div>
         @endif


         @if ($timesheets->isEmpty())
            <p>   There is no timesheetRow.</p>
         @else
            <table   class="table">
               <thead>
               <tr>
                  <th>empl Id</th>
                  <th>Day</th>                  
                  <th>time_from</th>
                  <th>time_to</th>
                  <th>lunch_brk</th>
                  <th>coffee_brk</th>
                  <th>proj_id</th>
                  <th>week_id</th>
               </tr>
               </thead>
               <tbody>
                  @foreach($timesheets as $timesheetRow)
                     <tr>                        
                        <?php 
                        /* 
                        <td>                                  
                           <a href="{!! action('Admin\EmployeesController@edit',  $timesheetRow->id) !!}"> 
                              {!! $timesheetRow->id !!} </a>
                        </td> 
                        */
                        ?>
                        <td>{!!  $timesheetRow->employee_id !!}</td>
                        <td>{!!  $timesheetRow->day !!}</td>
                        <td>{!!  $timesheetRow->time_from !!}</td>
                        <td>{!!  $timesheetRow->time_to !!}</td>
                        <td>{!!  $timesheetRow->lunch_brk !!}</td>
                        <td>{!!  $timesheetRow->coffee_brk !!}</td>
                        <td>{!!  $timesheetRow->proj_id !!}</td>
                        <td>{!!  $timesheetRow->week_id !!}</td>                     
                     </tr>
                  @endforeach
               </tbody>
            </table>
         @endif
      </div>
   </div>      

@endsection