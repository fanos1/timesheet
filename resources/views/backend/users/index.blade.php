@extends('master')

@section('title', 'all users')

@section('content')
   
   <div	class="container">
		<div class="col-12">
	
			<h2>All	users</h2>
			
			@if	(session('status'))
				<div class="alert alert-success">
					{{	session('status') }}
				</div>
			@endif


			@if	($users->isEmpty())
				<p>	There is no	user.</p>
			@else
				<table	class="table">
					<thead>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Email</th>
						<th>Joined	at</th>
					</tr>
					</thead>
					<tbody>
						@foreach($users as $user)
							<tr>
								<td>{!!	$user->id !!}</td>
							<td>							
							<a	href="{!! action('Admin\UsersController@edit',	$user->id) !!}"> {!! $user->name !!} </a>

							</td>
								<td>{!!	$user->email !!}</td>
								<td>{!!	$user->created_at !!}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			@endif
		</div>
	</div>		

@endsection