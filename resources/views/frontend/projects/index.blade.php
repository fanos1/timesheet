@extends('master')
@section('title', 'All projects')
@section('content')

    <div class="container">
        <div class="col-12">
        
                @foreach ( App\Project::all() as $project )                
                    <div>
    					<a href="{!! action('ProjectsController@show', $project->id) !!}">{!! $project->name !!}</a>
    				</div>
                @endforeach

            @endif
        </div>
    </div>

@endsection