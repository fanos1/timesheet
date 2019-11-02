@extends('master')
@section('title', 'Home page')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <h1>Welcome to home page</h1>

            @foreach(App\Project::all() as $project)            
                @if($project->id == 100)                  
                    <!-- <li><a href="/" title="home page">Home</a></li> -->
                @else
                    <li>
                        <a href="{!! action('ProjectsController@show', $project->id) !!}" title="{!! $project->id !!}">
                            {!! $project->name !!}
                        </a>
                    </li>
                @endif                 
            @endforeach
            
        </div>
    </div>
</div>
@endsection