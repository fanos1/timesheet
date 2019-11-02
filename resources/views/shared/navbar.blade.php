<div class="container" style="text-align: right;"> 
    <div class="col-12">
    
        @if(Auth::check())
            <a href="/users/logout">Logout | </a>
            @role('manager')
                <a href="/admin" title="login to admin">Admin | </a>
            @endrole            
            <div><a href="/admin" title=" to admin">Admin Dashboard</a></div>            
        @else
            <a href="/users/register">Register |</a>
            <a href="/users/login">Login | </a>
        @endif        
    </div>
</div>


<nav class="container" id="top">
    <div class="col-12">
        <ul>
            <?php
                /* 
                $pages = App\Page::where('menu_id', '=', 1)->get(); // 1 is for TOP NAVBAR
                foreach ($pages as $key => $page) {
                    // echo "<h3>".$key . "::". $page."</h3>";
                    echo "<h3>". $page->title ."</h3>";
                }
                exit();
                */
            ?>

            <li><a href="/" title="home page">Home</a></li>
                
            @foreach(App\Employee::all() as $employee)            
                @if($employee->id == 100)                  
                    <!-- <li><a href="/" title="home page">Home</a></li> -->
                @else
                    <li>
                        <a href="{!! action('FrontController@show', $employee->id) !!}" title="{!! $employee->id !!}">
                            {!! $employee->f_name !!}
                        </a>
                    </li>
                @endif                 
            @endforeach


            <?php 
            /* 
            @foreach(App\Timesheet::all() as $timesheet)  
                
                <?php 
                    // get associated week for each $timesheet Row object
                    $collection = $timesheet->week()->get();                     
                    // dd( $collection[0]->title );   // w1
                ?>                
                <li>
                    <a href="/employee/{!! $timesheet->employee_id !!}/week/{!! $timesheet->week_id !!}" >                        
                        {!! $collection[0]->title !!}
                    </a>
                </li>
            @endforeach 
            */
            ?>
            
        </ul>
    </div>
</nav>
