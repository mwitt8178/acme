<?php $__env->startSection('page_heading','Profile'); ?>

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
		<div class="col-lg-1 pull-right"><a class='btn btn-primary btn-sm' href="/dashboard/users/edit/<?php echo $current_user->id; ?>">Edit Profile</a></div>
		<div class="col-lg-4">
			<div class="col-lg-12 text-center"><h2><?php echo $current_user->name; ?></h2></div>
			<div class='col-lg-12'><img src="http://zblogged.com/wp-content/uploads/2015/11/17.jpg" class="img-responsive center-block img-circle" alt="Cinque Terre" style="width:204px;height:auto;"></div>
		</div>
		<div class="col-lg-8">
			<div class="row">
				<h4>General Contact Information</h4>
				<hr>
				<label>Email: </label>&nbsp;&nbsp;<?php echo $current_user->email; ?>

				</br>
				</br>
				<h4>General Information</h4>
				<hr>
				<label>Position: </label>&nbsp;&nbsp;<?php echo $current_user->position; ?></br>
				<label>Birthday: </label>&nbsp;&nbsp;<?php echo date('m-d-Y', strtotime($current_user->birthday)); ?></br>
				<label>Department: </label>&nbsp;&nbsp;<?php echo $current_user->department; ?></br>
				<label>Supervisor: </label>&nbsp;&nbsp;<?php echo $current_user->supervisor; ?>

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
					{data: 'created_at', name: 'created_at'},
					{data: 'actions', name: 'actions', name: 'action', orderable: false, searchable: false}
				]
			});
		});
	</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>