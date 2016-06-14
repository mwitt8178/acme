<?php $__env->startSection('body'); ?>
 <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo url ('/dashboard'); ?>">ACME</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                Welcome, <?php echo $current_user->name; ?>!
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="/dashboard/profile"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo url ('/logout'); ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li <?php echo (Request::is('*dashboard') ? 'class="active"' : ''); ?>>
                            <a href="<?php echo url ('/dashboard'); ?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li <?php echo (Request::is('*users') ? 'class="active"' : ''); ?>>
                            <a href="<?php echo url ('/dashboard/users'); ?>"><i class="fa fa-users fa-fw"></i> Users</a>
                        </li>
                        <li <?php echo (Request::is('*customers') ? 'class="active"' : ''); ?>>
                            <a href="<?php echo url ('/dashboard/customers'); ?>"><i class="fa fa-envelope fa-fw"></i> Customers</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
			 <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo $__env->yieldContent('page_heading'); ?></h1>
                </div>
                <!-- /.col-lg-12 -->
           </div>
			<div class="row">
				<?php echo $__env->yieldContent('section'); ?>

            </div>
            <!-- /#page-wrapper -->
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.plane', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>