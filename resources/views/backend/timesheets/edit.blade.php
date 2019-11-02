@extends('master')

@section('title', 'Show form to Timesheet row')

@section('content')
   
   <div	class="container col-md-8 col-md-offset-2">
		<div class="well well bs-component">

			<form	class="form-horizontal"	method="post">
				@foreach($errors->all() as $error)
					<p	class="alert alert-danger">{{ $error }}</p>
				@endforeach

				@if	(session('status'))
					<div class="alert alert-success">
						{{ session('status') }}
					</div>
				@endif

				{!!	csrf_field() !!}

				<fieldset>
					<legend>Edit Timesheet row</legend>
					<div class="form-group">
						<label for="time_from" class="sr-only">Time_from</label>
						<div class="col-10">
							<input	type="text"	class="form-control" placeholder="7.50"	
							name="time_from" value="{{ $timesheet->time_from }}" />
						</div>
					</div>
					<div class="form-group">
						<label	for="time_to"	class="sr-only">Time_to</label>
						<div class="col-10">
							<input	type="text" class="form-control" placeholder="18" 
							name="time_to" value="{{ $timesheet->time_to }}" />
						</div>
					</div>
					
					<button	type="submit"	class="btn	btn-primary">Submit</button>
				</fieldset>
			</form>

		</div>
	</div>		

@endsection