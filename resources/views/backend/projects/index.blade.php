@extends('master')

@section('title', 'all weeks')

@section('content')
   
   <div  class="container">
      <div class="col-12">
   
         <h2>All  projects</h2>
         
         @if   (session('status'))
            <div class="alert alert-success">
               {{ session('status') }}
            </div>
         @endif


         @if ($projects->isEmpty())
            <p>   There is no projects.</p>
         @else
            <table   class="table">
               <thead>
               <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Joined  at</th>
               </tr>
               </thead>
               <tbody>
                  @foreach($projects as $projects)
                     <tr>
                        <td>{!!  $projects->id !!}</td>
                     <td>                    
                     <a href="{!! action('Admin\ProjectsController@edit',  $projects->id) !!}"> {!! $projects->name !!} </a>
                     </td>
                        <td>{!!  $projects->email !!}</td>
                        <td>{!!  $projects->created_at !!}</td>
                     </tr>
                  @endforeach
               </tbody>
            </table>
         @endif
      </div>
   </div>      

@endsection