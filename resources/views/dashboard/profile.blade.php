@extends('layouts.dashboard')
@section('page_heading','Profile')

@section('section')
	@if (count($errors) > 0)
		<div class="col-lg-12 alert alert-danger">
			<strong>Whoops!</strong> There were some problems.
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

	<div class="col-lg-12">
		<div class="col-lg-1 pull-right"><a class='btn btn-primary btn-sm' href="/dashboard/users/edit/{{$current_user->id}}">Edit Profile</a></div>
		<div class="col-lg-4">
			<div class="col-lg-12 text-center"><h2>{{$current_user->name}}</h2></div>
			<div class='col-lg-12'><img src="http://zblogged.com/wp-content/uploads/2015/11/17.jpg" class="img-responsive center-block img-circle" alt="Cinque Terre" style="width:204px;height:auto;"></div>
		</div>
		<div class="col-lg-8">
			<div class="row">
				<h4>General Contact Information</h4>
				<hr>
				<label>Email: </label>&nbsp;&nbsp;{{$current_user->email}}
				</br>
				</br>
				<h4>General Information</h4>
				<hr>
				<label>Position: </label>&nbsp;&nbsp;{{$current_user->position}}</br>
				<label>Birthday: </label>&nbsp;&nbsp;{{date('m-d-Y', strtotime($current_user->birthday))}}</br>
				<label>Department: </label>&nbsp;&nbsp;{{$current_user->department}}</br>
				<label>Supervisor: </label>&nbsp;&nbsp;{{$current_user->supervisor}}
			</div>
		</div>
	</div>

@stop



@section('footer_scripts')
	<script type='text/javascript' src="{{ url('/vendor/datatables/buttons.server-side.js')}}"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			oTable = $('#users').DataTable({
				"processing": true,
				"ajax": "/dashboard/users/all",
				"columns": [
					{data: 'name', name: 'name'},
					{data: 'email', name: 'email'},
					{data: 'created_at', name: 'created_at'},
					{data: 'actions', name: 'actions', name: 'action', orderable: false, searchable: false}
				]
			});
		});
	</script>

@stop