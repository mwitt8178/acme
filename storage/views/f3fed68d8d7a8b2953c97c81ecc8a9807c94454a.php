<?php $__env->startSection('page_heading','Users'); ?>

<?php $__env->startSection('section'); ?>
	<?php if(count($errors) > 0): ?>
		<div class="col-lg-12 alert alert-danger">
			<strong>Whoops!</strong> There were some problems.
			<ul>
				<?php foreach($errors->all() as $error): ?>
					<li><?php echo $error; ?></li>
				<?php endforeach; ?>
			</ul>
		</div>
	<?php endif; ?>

	<div class="col-lg-12">
		<div class="row">
			<div class="col-lg-2 pull-right"><a href="<?php echo url('/dashboard/users/create'); ?>" class="btn btn-primary btn-md btn-block">Add New User</a></div></br></br>
			<div class="col-sm-12">
				<table id="users" class="table table-hover table-condensed">
					<thead>
					<tr>
						<th class="col-md-3">Name</th>
						<th class="col-md-3">Email</th>
						<th class="col-md-3">Department</th>
						<th class="col-md-3">Supervisor</th>
						<th class="col-md-3">Create Date</th>
						<th class="col-md-3"></th>
					</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('footer_scripts'); ?>
	<script type='text/javascript' src="<?php echo url('/vendor/datatables/buttons.server-side.js'); ?>"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			oTable = $('#users').DataTable({
				"processing": true,
				"ajax": "/dashboard/users/all",
				"columns": [
					{data: 'name', name: 'name'},
					{data: 'email', name: 'email'},
					{data: 'department', name: 'department'},
					{data: 'supervisor', name: 'supervisor'},
					{data: 'created_at', name: 'created_at'},
					{data: 'actions', name: 'actions', name: 'action', orderable: false, searchable: false}
				]
			});
		});
	</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>