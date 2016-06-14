@extends('layouts.dashboard')
@section('page_heading','Customers')

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
		<div class="row">
			<div class="col-lg-2 pull-right"><a href="{{url('/dashboard/customers/create')}}" class="btn btn-primary btn-md btn-block">Add New Customer</a></div></br></br>
			<div class="col-sm-12">
				<table id="customers" class="table table-hover table-condensed">
					<thead>
					<tr>
						<th class="col-md-3">First Name</th>
						<th class="col-md-3">Last Name</th>
						<th class="col-md-3">Email</th>
						<th class="col-md-3">Phone</th>
						<th class="col-md-3">Company</th>
						<th class="col-md-3">Address 1</th>
						<th class="col-md-3">Create Date</th>
						<th class="col-md-3"></th>
					</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>

@stop



@section('footer_scripts')
	<script type='text/javascript' src="{{ url('/vendor/datatables/buttons.server-side.js')}}"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			oTable = $('#customers').DataTable({
				"processing": true,
				"ajax": "/dashboard/customers/all",
				"columns": [
					{data: 'first_name', name: 'first_name'},
					{data: 'last_name', name: 'last_name'},
					{data: 'email', name: 'email'},
					{data: 'phone', name: 'phone'},
					{data: 'company', name: 'company'},
					{data: 'address_1', name: 'address_1'},
					{data: 'created_at', name: 'created_at'},
					{data: 'actions', name: 'actions', name: 'action', orderable: false, searchable: false}
				]
			});
		});
	</script>

@stop