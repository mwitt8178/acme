<?php $__env->startSection('page_heading','Add Customer'); ?>

<?php $__env->startSection('section'); ?>
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-1 pull-right"><a href="<?php echo url('/dashboard/customers'); ?>" class="btn btn-primary btn-md">Back</a></div></br></br>
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
                <form role="form" action="/dashboard/customers/store" method="post">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <div class="form-group">
                            <label>First Name</label>
                            <input class="form-control" name='first_name' <?php if(count($errors) > 0): ?>value="<?php echo Request::old('first_name'); ?>" <?php endif; ?> placeholder="First Name">
                        </div>

                        <div class="form-group">
                            <label>Last Name</label>
                            <input class="form-control" name='last_name' <?php if(count($errors) > 0): ?>value="<?php echo Request::old('last_name'); ?>" <?php endif; ?> placeholder="Last Name">
                        </div>

                        <div class="form-group">
                            <label>Company</label>
                            <input class="form-control" name='company' <?php if(count($errors) > 0): ?>value="<?php echo Request::old('company'); ?>" <?php endif; ?> placeholder="company">
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" type="email" name='email' <?php if(count($errors) > 0): ?>value="<?php echo Request::old('email'); ?>" <?php endif; ?> placeholder="Email">
                        </div>

                        <div class="form-group">
                            <label>Phone</label>
                            <input class="form-control" name='phone' <?php if(count($errors) > 0): ?>value="<?php echo Request::old('phone'); ?>" <?php endif; ?> placeholder="Phone">
                        </div>

                        <div class="form-group">
                            <label>Address 1</label>
                            <input class="form-control" name='address_1' <?php if(count($errors) > 0): ?>value="<?php echo Request::old('address_1'); ?>" <?php endif; ?> placeholder="Address 1">
                        </div>

                        <div class="form-group">
                            <label>Address 2</label>
                            <input class="form-control" name='address_2' <?php if(count($errors) > 0): ?>value="<?php echo Request::old('address_2'); ?>" <?php endif; ?> placeholder="Address 2">
                        </div>

                        <div class="form-group">
                            <label>City</label>
                            <input class="form-control" name='city' <?php if(count($errors) > 0): ?>value="<?php echo Request::old('city'); ?>" <?php endif; ?> placeholder="City">
                        </div>

                        <div class="form-group">
                            <label>State</label>
                            <input class="form-control" name='state' <?php if(count($errors) > 0): ?>value="<?php echo Request::old('state'); ?>" <?php endif; ?> placeholder="State">
                        </div>

                        <div class="form-group">
                            <label>Zip</label>
                            <input class="form-control" name='zip' <?php if(count($errors) > 0): ?>value="<?php echo Request::old('zip'); ?>" <?php endif; ?> placeholder="Zip">
                        </div>

                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="/dashboard/customers/create" class="btn btn-danger">Reset</a>
                </form>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('footer_scripts'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>