@extends('master')
@section('title', 'View a specific Project')
@section('content')


<div class="container">
    <div class="col-12">
            
            <h2 class="header">{!! $project->title !!}</h2>
            <p> {!! $project->name !!} </p>
        
            

            <?php /* 
                    @foreach($comments as $comment)
                        <div class="well well bs-component">
                            <div class="content">
                                {!! $comment->content !!}
                            </div>
                        </div>
                    @endforeach


                    
                    
                    $lunch_brks_this_week  = 0;
                    
                    $lunch_coffee_brks =0;
                */
                    $tot_hrs = 0;
                    $hrsToPayEmployee = 0; 
                    $hrsToChargeClient = 0;
            ?>
            

            @foreach($timesheetThisProj as $timesheet)
                <div class="well well bs-component">
                    <div class="content">
                        <?php 
                        // {{ dd($timesheet) }}  
                        // {{ $timesheet->time_from }} <br/>
                        ?>
                        
                    </div>
                </div>

                <?php 
                    $hrsToPayEmployee = $hrsToPayEmployee + $timesheet->hrs_min_lunc; 
                    $tot_hrs = $tot_hrs + ($timesheet->time_to - $timesheet->time_from) ;
                    $hrsToChargeClient = $hrsToChargeClient + $timesheet->hrs_min_brks; 

                    /*                     
                    
                    $lunch_brks_this_week = $lunch_brks_this_week + $v->lunch_brk;
                    $lunch_coffee_brks = $lunch_coffee_brks + $v->coffee_brk;                    
                    */
                ?>

            @endforeach
            

           
    </div>
</div>



<div class="container">
    <div class="col-12">
        <table class="table table-bordered">
            <tr bgcolor="#13ec5d">
                <th>Total Hours</th>                
                <th>To Pay EMPLOYEE this Project (hrs - lunch)</th>
                <th>Client To Pay</th>
            </tr>
            <tr>
                <td><?php echo "<h3>" . $tot_hrs ."</h3>"; ?>   </td>                
                <td><?php echo "<h3>" . $hrsToPayEmployee ." Hours</h3>"; ?>  </td>
                <td><?php echo "<h3>" . $hrsToChargeClient ." Hours</h3>"; ?>  </td>
            </tr>
        </table>
    </div>
</div>
@endsection