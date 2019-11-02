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

        <h2>Rows for <span class="colr"> {!! $employee->f_name !!}</span> 
            for  week <span class="colr"> {!! $week->title !!} </span>
            for  project <span class="colr"> {!! $project->name !!} </span>
        </h2>

         <table class="table  table-bordered">
            <tr bgcolor="#13ec5d">
                <th>day</th>
                <th>time_from</th>
                <th>time_to</th>
                <th>lunch</th>
                <th>coffee</th>
                <th>proj ID</th>
                <th>week ID</th>
                <th>hrs minus Lunch</th>
                <th>hrs minus All Breaks</th>
                <th>Action</th>
            </tr>
            <?php // timesheet rows here are specific for an employee, for specific week, and specific to project
                // rows for Irfan WHERE week is 1, AND project is 1.
                $hrsToPayEmployee = 0; 
                $hrsToChargeClient = 0;
                $lunch_brks_this_week  = 0;
                $tot_hrs = 0;
                $lunch_coffee_brks =0;
            ?>

            @foreach ($rows as $v)

                <?php 
                    /* 
                    // gmdate — Format a GMT/UTC date/time from timestamp OR integer
                    // start by converting to seconds (integers). 
                    // 1 hour has 3600 s
                        $seconds = floor($v->time_from * 3600);
                        echo "<h3>". gmdate('H:i:s', $seconds) . "</h3>";
                    */
                ?>
                <tr>
                    <td>{!! $v->day !!}</td>
                    <td>{!! $v->time_from !!} = <?php echo gmdate('H:i:s', floor($v->time_from * 3600) ); ?> </td>
                    <td>{!! $v->time_to !!}  = <?php echo gmdate('H:i:s', floor($v->time_to * 3600) ); ?> </td>
                    <td>{!! $v->lunch_brk !!} = <?php echo gmdate('H:i:s', floor($v->lunch_brk * 3600) ); ?> </td>
                    <td>{!! $v->coffee_brk !!} = <?php echo gmdate('H:i:s', floor($v->coffee_brk * 3600) ); ?> </td>
                    <td>{!! $v->proj_id !!}</td>
                    <td>{!! $v->week_id !!}</td>
                    <td>{!! $v->hrs_min_lunc !!}= <?php echo gmdate('H:i:s', floor($v->hrs_min_lunc * 3600) ); ?></td>
                    <td>{!! $v->hrs_min_brks !!}= <?php echo gmdate('H:i:s', floor($v->hrs_min_brks * 3600) ); ?></td>
                    <td> 
                        <!-- <a href="{!! action('Admin\TimesheetsController@edit', $v->id) !!}">Edit </a> -->
                        <a href="{!! action('Admin\TimesheetsController@destroy', $v->id) !!}" 
                            title="delete" class="btn btn-custom">Delete </a>
                    </td>
                </tr>
                <?php 
                    $hrsToPayEmployee = $hrsToPayEmployee + $v->hrs_min_lunc; 
                    $hrsToChargeClient = $hrsToChargeClient + $v->hrs_min_brks; 
                    $lunch_brks_this_week = $lunch_brks_this_week + $v->lunch_brk;
                    $lunch_coffee_brks = $lunch_coffee_brks + $v->coffee_brk;
                    $tot_hrs = $tot_hrs + ($v->time_to - $v->time_from) ;
                ?>
            @endforeach                          
        </table>       
    </div>
</div>






<div class="container">
    <div class="col-12">
        <table class="table table-bordered">
            <tr bgcolor="#13ec5d">
                <th>Total Hours</th>
                <th>Total LUNCH BREAKs This Week</th>
                <th>TO PAY EMPLOYEE for this Week (hrs minus lunch)</th>
                <th>TO CHARGE CLIENT for this Week (hrs minus lunch + coffee)</th>
                <th>Tot Coffee Breaks</th>
            </tr>
            <tr>
                <td><?php echo "<h3>" . $tot_hrs ."</h3>"; ?>   </td>
                <td><?php echo "<h3>". $lunch_brks_this_week ." Hours </h3>"; ?> </td>
                <td><?php echo "<h3>" . $hrsToPayEmployee ." Hours</h3>"; ?>  </td>
                <td><?php echo "<h3>". $hrsToChargeClient ." Hours </h3>"; ?></td>
                <td><?php echo "<h3>". $lunch_coffee_brks ." Hours </h3>"; ?></td>
            </tr>
        </table>
    </div>
</div>


@endsection