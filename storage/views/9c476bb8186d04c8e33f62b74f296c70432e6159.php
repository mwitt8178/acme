<div class="panel panel-<?php echo e(isset($class) ? $class : 'default'); ?>">
	<?php if( isset($header)): ?>  
		<div class="panel-heading clearfix">
		<h3 class="panel-title pull-left" style="padding-top: 7.5px;"><?php echo $__env->yieldContent($as . '_panel_title'); ?>
		<?php if( isset($controls)): ?>  
	<div class="panel-control pull-right">
		<a class="panelButton"><i class="fa fa-refresh"></i></a>
		<a class="panelButton"><i class="fa fa-minus"></i></a>
		<a class="panelButton"><i class="fa fa-remove"></i></a>
	</div>
	<?php endif; ?>
	</h3>

	<div class="col-sm-3 pull-right"><?php echo $__env->yieldContent($as.'_panel_back_button'); ?></div>

	</div>
	<?php endif; ?>
	
	<div class="panel-body">
		<?php echo $__env->yieldContent($as . '_panel_body'); ?>
	</div>
	<?php if( isset($footer)): ?>
		<div class="panel-footer"><?php echo $__env->yieldContent($as . '_panel_footer'); ?></div>
	<?php endif; ?>
</div>

