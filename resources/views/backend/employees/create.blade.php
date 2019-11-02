@extends('master')
@section('title',	'Create a Employee')

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
            <legend>Create a new employees </legend>
            <div class="form-group">
               <div class="col-lg-10">
                  <input type="text" name="f_name" class="form-control" placeholder="First Name">
               </div>
            </div>
            <div class="form-group">
               <div class="col-lg-10">
                  <input type="text" name="l_name" class="form-control" placeholder="Last Name">
               </div>
            </div>


            <div class="form-group">
               <div class="form-group">
                  <button type="submit" class="btn btn-primary">Submit</button>
               </div>
           </div>
         </fieldset>        

      </form>


   </div>
</div>
@endsection

