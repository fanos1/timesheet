@extends('master')
@section('title', 'View a post/page')
@section('content')

<style type="text/css">
    .colr {
        color: red;
        font-weight: 700;
    }
</style>
<div class="container">
    <div class="col-12">

        <h2>Timesheet rows for  <span class="colr"> {!! $employee->f_name !!}</span>
          For the week <span class="colr">{!! $week->title !!}</span>  
        </h2>        
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
            <?php 
                // At @ point, all rows from the Timesheet Table are specific to single Employee i.e irfan, 
            // and specific to week numb 1 etc..  i.e. Rows where emplyee is Irfan, AND where week is w1
            ?>
            @foreach ($timeRowsThisEmployThisWeek as $v)
                <?php 
                    // get associated week for each $timesheet Row object
                    // $collection = $timesheet->week()->get();                     
                    // dd( $collection[0]->title );   // w1
                    // $collection = $v->timesheets()->get();

                    $project = App\Project::whereId($v->proj_id)->firstOrFail();
                    // dd($project->name); // Van der Zwan
                ?>

                <tr>
                    <td>{!! $v->day !!}</td>
                    <td>{!! $v->time_from !!}</td>
                    <td>{!! $v->time_to !!}</td>
                    <td>{!! $v->lunch_brk !!}</td>
                    <td>{!! $v->coffee_brk !!}</td>
                    <td>
                        <a href="/employee/{!! $employee->id !!}/week/{!! $week->id !!}/proj/{!! $v->proj_id !!}">
                            {!! $v->proj_id !!} - {!! $project->name !!}
                        </a>                            
                    </td>
                    <td>{!! $v->week_id !!}</td>
                    <td>{!! $v->hrs_min_lunc !!}</td>
                    <td>{!! $v->hrs_min_brks !!}</td>
                </tr>       

            @endforeach          
        </table>
       
    </div>
</div>


@endsection