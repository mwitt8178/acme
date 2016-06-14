<?php $__env->startSection('body'); ?>
<div class="container">
    <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <br /><br /><br />
                <?php $__env->startSection('auth.login_panel_title','Please Sign In'); ?>
                <?php $__env->startSection('auth.login_panel_body'); ?>
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

                    <?php if(session('auth_message')): ?>
                            <div class="alert alert-success">
                                <?php echo session('auth_message'); ?>

                            </div>
                    <?php endif; ?>

                    <form role="form" action="<?php echo url ('login/authenticate'); ?>" method="post">
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <div class="link">
                                    <p>Forgot your password? <a href="<?php echo url ('auth/forgotpassword'); ?>">click here</a></p>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type='submit' class="btn btn-lg btn-success btn-block" value="Login"/>
                            </fieldset>
                        </form>

                    <?php $__env->stopSection(); ?>
                    <?php echo $__env->make('widgets.panel', array('as'=>'auth.login', 'header'=>true), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.plane', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>