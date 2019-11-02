@extends('master')
@section('title', 'Admin Control Panel')

@section('content')

<style type="text/css">
	.border {
		border: 1px red solid;
	}
</style>
   
   <div	class="container">
		<div class="col-12">
			
			<article class="border">
				<h4>Manage users</h4>
				<div><a href="/admin/users" class="btn btn-primary">All users</a></div>	
			</article>
			
			<article class="border">
				<h4>Manage Employees</h4>
				<div>
					<a href="/admin/employees" class="btn btn-primary">All employees</a>
					<a href="/admin/employees/create" class="btn btn-primary">Create employees</a>
				</div>
			</article>

			<article class="border">
				<h4>Manage Timesheeets</h4>
				<div>
					<a href="/admin/timesheets" class="btn btn-primary">All timesheet rows</a>
					<a href="/admin/timesheets/create" class="btn btn-primary">Create timesheets</a>
				</div>
			</article>

			<article class="border">
				<div>
					<h4>Manage Rolse </h4>
					<a href="/admin/roles" class="btn btn-primary">All Roles</a>
					<a href="/admin/roles/create" class="btn btn-primary">Create A Role</a>
				</div>
			</article>

			<article class="border">
				<div>
					<h4>Manage Category </h4>
					<a href="/admin/categories" class="btn btn-primary">All Categories</a>
					<a href="/admin/categories/create" class="btn btn-primary">Create Category</a>
				</div>
			</article>
			
				<article class="border">
				<div>
					<h4>Weeks </h4>				
					<a href="/admin/weeks/create" class="btn btn-primary" title="create wee">create Week</a>
				</div>
			</article>

				<article class="border">
				<div>
					<h4>Projects </h4>			
					<a href="/admin/projects" class="btn btn-primary">All project rows</a>	
					<a href="/admin/projects/create" class="btn btn-primary" title="create proje">create Project</a>
				</div>
			</article>
		</div>	
   </div>		

@endsection