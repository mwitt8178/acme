<?php $__env->startSection('page_heading','Edit User'); ?>

<?php $__env->startSection('section'); ?>
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-1 pull-right"><a href="<?php echo url('/dashboard/users'); ?>" class="btn btn-primary btn-md">Back</a></div></br></br>
            <div class="col-sm-6">
                <?php if(count($errors) > 0): ?>
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems.<br><br>
                        <ul>
                            <?php foreach($errors->all() as $error): ?>
                                <li><?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <?php if(session('success')): ?>
                    <div class="alert alert-success">
                        <?php echo session('success'); ?>

                    </div>
                <?php endif; ?>
                <form role="form" action="/dashboard/users/update/<?php echo $id; ?>" method="post">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" name='name' <?php if(count($errors) < 1): ?>value="<?php echo $name; ?>"<?php else: ?> value="<?php echo Request::old('name'); ?>" <?php endif; ?> placeholder="Name">
                    </div>

                    <div class="form-group">
                        <label>Department</label>
                        <input class="form-control" name='department' <?php if(count($errors) < 1): ?>value="<?php echo $department; ?>"<?php else: ?> value="<?php echo Request::old('department'); ?>" <?php endif; ?> placeholder="Department">
                    </div>

                    <div class="form-group">
                        <label>Supervisor</label>
                        <input class="form-control" name='supervisor' <?php if(count($errors) < 1): ?>value="<?php echo $supervisor; ?>"<?php else: ?> value="<?php echo Request::old('supervisor'); ?>" <?php endif; ?> placeholder="Supervisor">
                    </div>

                    <div class="form-group">
                        <label>Position</label>
                        <input class="form-control" name='position' <?php if(count($errors) < 1): ?>value="<?php echo $position; ?>"<?php else: ?> value="<?php echo Request::old('position'); ?>" <?php endif; ?> placeholder="Position">
                    </div>

                    <div class="form-group">
                        <label>Birthday</label>
                        <input class="form-control" type='date' name='birthday' <?php if(count($errors) < 1): ?>value="<?php echo $birthday; ?>"<?php else: ?> value="<?php echo Request::old('birthday'); ?>" <?php endif; ?>>
                    </div>

                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="/dashboard/users/edit/<?php echo $id; ?>" class="btn btn-danger">Reset</a>
                </form>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('footer_scripts'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>