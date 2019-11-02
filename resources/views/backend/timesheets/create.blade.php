@extends('master')
@section('title',	'Create a Timesheet')

@section('content')

<div class="container">
   <div class="col-12">
      
      <form class="form-horizontal" method="post">
         @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
         @endforeach

         @if(session('status')) 
            <div class="alert alert-success">
               {{ session('status') }}
            </div>
         @endif   

         <input type="hidden" name="_token" value="{!! csrf_token() !!}" />

         <fieldset>
            <legend>Create a new timesheet record </legend>
           
            <div class="col-10">
                <select class="form-control" name="employee_id[]" multiple>                  
                    @foreach($employees as $employee)
                      <option value="{!! $employee->id !!}">
                        {!! $employee->f_name !!} - {!! $employee->l_name !!} 
                      </option>  
                    @endforeach     
                    <!--                
                    <option value="2">irfan Kissa </option>
                    <option value="1">Ilkan Karachous </option>
                    <option value="3">Tzelal kissa </option> 
                    -->
                </select>
            </div>


            <div class="form-group">
               <div class="col-10">
                  <!-- <input type="text" name="day" class="form-control" placeholder="Date"> -->
                  <label for="day">Day</label>
                  <input type="date" name="day" value="2019-10-21" min="2019-08-10" max="2019-12-31" placeholder="Date">
               </div>
            </div>


            <div class="form-group">
               <div class="col-10">
                    <label for="time_from">Time from</label>
                  <!-- <input type="text" name="time_from" class="form-control" placeholder="7.50"> -->
                    <select class="form-control" name="time_from">
                      <option value="7.50">7:30 AM</option>
                      <option value="7.75">7:45 AM</option>
                      <option value="8.00">8:00 AM</option>
                      <option value="8.25">8:15 AM</option>
                      <option value="8.50">8:30 AM</option>
                      <option value="8.75">8:45 AM</option>
                      <option value="9.00">9:00 AM</option>
                      <option value="9.25">9:15 AM</option>
                      <option value="9.50">9:30 AM</option>
                    </select>
               </div>
            </div>            
            <div class="form-group">
               <div class="col-10">
                    <label for="time_to">Time to</label>
                    <!-- <input type="text" name="time_to" class="form-control" placeholder="18.50"> -->
                    <select class="form-control" name="time_to">
                      <option value="18">18:00</option>
                      <option value="18.25">18:15 </option>
                      <option value="18.50">18:30 </option>
                      <option value="18.75">18:45 </option>
                      <option value="19.00">19:00 </option>
                      <option value="19.25">19:15 </option>
                      <option value="19.50">19:30 </option>
                      <option value="19.75">19:45 </option>
                      <option value="20.00">20:00 </option>
                      <option value="20.25">20:15 </option>
                      <option value="20.50">20:30 </option>
                      <option value="20.75">20:45 </option>
                      <option value="21.00">21:00 </option>
                      <option value="21.25">21:15 </option>
                      <option value="21.50">21:30 </option>
                      <option value="21.75">21:45 </option>
                      <option value="22.00">22:00 </option>
                      <option value="22.25">22:15 </option>
                      <option value="22.50">22:30 </option>
                      <option value="23.00">23:00 </option>                      
                      
                    </select>
               </div>
            </div>
            <div class="form-group">
               <div class="col-10">
                  <!--                  
                  <input type="text" name="lunch_brk" class="form-control" placeholder="0.50"> -->
                  <label for="lunch_brk">Lunch Break</label>
                  <select class="form-control" name="lunch_brk">
                      <option value="0.50">30 minutes</option>
                      <option value="1.00">1 hour </option>
                  </select>
               </div>
            </div>
            <div class="form-group">
               <div class="col-10">                  
                  <!-- <input type="text" name="coffee_brk" class="form-control" placeholder="0.15"> -->
                    <label for="coffee_brk">Coffee Break</label>
                    <select class="form-control" name="coffee_brk">
                      <option value="0.50">30 minutes</option>
                      <option value="0.25">15 minutes</option>
                      <option value="0.75">45 minutes</option>
                    </select>
               </div>
            </div>
            <div class="form-group">
               <div class="col-10">
                  <label for="proj_id">Project id</label>
                  <select class="form-control" name="proj_id" multiple>                  
                    @foreach($projects as $project)
                      <option value="{!! $project->id !!}">
                          {!! $project->name !!} 
                      </option>  
                    @endforeach                         
                </select>
               </div>
            </div>


            <div class="form-group">
               <div class="col-10">
                  <label for="week_id">Week Id</label>                  
                  <select class="form-control" name="week_id" multiple>                  
                    @foreach($weeks as $week)
                      <option value="{!! $week->id !!}">
                          {!! $week->title !!} 
                      </option>  
                    @endforeach                         
                  </select>
               </div>
            </div>


            <div class="form-group">          
                <button type="submit" class="btn btn-custom">Submit</button>
           </div>

         </fieldset>        

      </form>


   </div>
</div>
@endsection

