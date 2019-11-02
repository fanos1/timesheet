@extends('master')
@section('title', 'View a post/page')
@section('content')


<div class="container">
    <div class="col-12">
        <h2 class="header">{!! $employee->f_name !!}</h2>  
        
        <nav id="weeks">
            <ul>
            @foreach($weeks as $week)              
                <li>
                    <a href="/employee/{!! $employee->id !!}/week/{!! $week->id !!}">
                        {!! $week->title !!}  for {!! $employee->f_name !!} |
                    </a>
                </li>        
            @endforeach
            </ul>
        </nav>


        <?php
        /* 
                <h3>For each project</h3>
                @foreach($projects as $project) 
                    <div>                
                    <a href="/employee/{!! $employee->id !!}/week/{!! $timesheet->week_id !!}/proj/{!! $timesheet->proj_id !!}">
                        {!! $employee->f_name !!}
                    </a>

                    </div> 
                 @endforeach
        */        
        ?>
    </div>
</div>        



<div class="container">
    <div class="col-12">
        <table class="table table-bordered">
          <tr>
            <th>day</th>
            <th>time_from</th>
            <th>time_to</th>
            <th>lunch</th>
            <th>coffee</th>
            <th>proj ID</th>
            <th>week ID</th>
            <th>hrs minus Lunch</th>
            <th>hrs minus Breaks</th>
          </tr>
            @foreach($timesheetRows as $timesheet)
                <tr>
                    <td>{!! $timesheet->day !!}</td>
                    <td>{!! $timesheet->time_from !!}</td>
                    <td>{!! $timesheet->time_to !!}</td>
                    <td>{!! $timesheet->lunch_brk !!}</td>
                    <td>{!! $timesheet->coffee_brk !!}</td>
                    <td>{!! $timesheet->proj_id !!}</td>
                    <td>{!! $timesheet->week_id !!}</td>
                    <td>{!! $timesheet->hrs_min_lunc !!}</td>
                    <td>{!! $timesheet->hrs_min_brks !!}</td>
                </tr>                
            @endforeach
          
        </table>
    </div>
</div>            




@endsection