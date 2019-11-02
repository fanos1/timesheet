@extends('master')

@section('title', 'Edit employee')

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
					<legend>Edit Employee</legend>
					<div class="form-group">
						<label for="first name" class="sr-only">first Name</label>
						<div class="col-10">
							<input	type="text"	class="form-control" placeholder="First Name"	
							name="f_name" value="{{ $employee->f_name }}" />
						</div>
					</div>
					<div class="form-group">
						<label	for="last name"	class="sr-only">Lat name</label>
						<div class="col-10">
							<input	type="text" class="form-control" placeholder="Last name" 
							name="l_name" value="{{ $employee->l_name }}" />
						</div>
					</div>
					
					<button	type="submit"	class="btn	btn-primary">Submit</button>
				</fieldset>
			</form>

		</div>
	</div>		

@endsection